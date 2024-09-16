<?php

namespace App\Models\common;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class QueryModel
{
    public function __construct()
    {
    }

    /**
     * Summary of getQueryData
     * @param array $query_data
     * @param mixed $is_disable
     * @param mixed $is_auth
     * @return \Illuminate\Support\Collection
     */
    public function getQueryData(array $query_data, $is_disable = false)
    {
        $is_auth = false;
        if (Auth::check()) {
            $user = Auth::user();
            $is_auth = true;
        }
        $table = $query_data['basetable']['table'];
        $alias = $query_data['basetable']['alias'];
        $query = DB::table("$table as $alias");

        // SELECT句の追加
        if (isset($query_data['select'])) {
            $select_columns = array_map(function ($data) {
                return "{$data['table']}.{$data['column']} as {$data['alias']}";
            }, $query_data['select']);
            $query = $query->select($select_columns);
        }

        // JOIN句の追加
        if (isset($query_data['join'])) {
            foreach ($query_data['join'] as $data) {
                $query = $query->leftJoin(
                    "{$data['table']} as {$data['alias']}",
                    "{$data['basetable']}.{$data['basetable_column']}",
                    "=",
                    "{$data['alias']}.{$data['column']}"
                );
            }
        }

        // WHERE句の追加
        if (isset($query_data['where'])) {
            foreach ($query_data['where'] as $data) {
                switch ($data['function']) {
                    case 'IN':
                        $query = $query->whereIn("{$data['table']}.{$data['column']}", $data['value']);
                        break;
                    default:
                        $query = $query->where("{$data['table']}.{$data['column']}", $data['function'], $data['value']);
                        break;
                }
            }
        }

        // 基本テーブルの追加条件
        $query = $query->where("$alias.is_delete", "=", false);
        if (!$is_disable) {
            $query = $query->where("$alias.is_disable", "=", false);
        }

        // JOINしたテーブルの追加条件
        if (isset($query_data['join'])) {
            foreach ($query_data['join'] as $data) {
                $joinAlias = $data['alias'];
                $query = $query->where("$joinAlias.is_delete", "=", false);
                if ($is_auth) {
                    $query = $query->where("$joinAlias.owner_id", "=", $user->owner_id);
                }
                if (!$is_disable) {
                    $query = $query->where("$joinAlias.is_disable", "=", false);
                }
            }
        }

        // ORDER句の追加
        if (isset($query_data['order'])) {
            foreach ($query_data['order'] as $data) {
                $query = $query->orderBy("{$data['table']}.{$data['column']}", $data['order']);
            }
        }

        // LIMIT句の追加
        if (isset($query_data['limit'])) {
            if (isset($query_data['limit']['count'])) {
                $query = $query->limit($query_data['limit']['count']);
            }
            if (isset($query_data['limit']['offset'])) {
                $query = $query->offset($query_data['limit']['offset']);
            }
        }

        // クエリの実行と結果の取得
        return $query->get();
    }

    /**
     * 参照テーブルのIDを取得するメソッド
     */
    public function getReferenceId($tableclass, array $data)
    {
        $tablemodel = new $tableclass();
        $table = $tablemodel->getTableName();
        $query = DB::table($table);

        foreach ($data as $column => $value) {
            $query->where($column, $value);
        }

        $querydata = $query->firstOrFail();
        if (empty($querydata)) {
            return null;
        }
        return $querydata->id;
    }
}
