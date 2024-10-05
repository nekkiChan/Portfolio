<?php

namespace App\Models\screens\private\profile\view;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\screens\ScreenModel;

class PrivateProfileViewModel extends ScreenModel
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    /**
     * クエリデータの設定
     *
     * @return void
     */
    protected function setupQueryData()
    {
        $content_category_config_data = config('dbtables.m101_content_categories.initdata');
        $content_category_id = null;
        foreach ($content_category_config_data as $id => $data) {
            $dataname = $data['name'];
            if ($dataname == 'profile') {
                $content_category_id = $id + 1;
            }
        }

        if (!empty($this->config_data['querydata'])) {
            $base_query_data = $this->config_data['querydata'];
            $route_query_data = [];
            if (!empty($this->config_data['routequerydata'])) {
                $route_query_data = $this->config_data['routequerydata'];
            }

            foreach ($base_query_data as $table => $query_data) {

                if (in_array($table, ['content_bodies_data', 'service_links_data'])) {
                    $query_data['where'][] = [
                        'table' => 'm102',
                        'column' => 'content_category_id',
                        'function' => '=',
                        'value' => $content_category_id,
                    ];
                }

                foreach ($route_query_data as $column => $route_query_subdata) {

                    foreach ($route_query_subdata['data'] as $name => $data) {

                        $is_exist_routequery = true;
                        if ($name != $table) {
                            $is_exist_routequery = false;
                            continue;
                        }

                        if ($data['table'] != $query_data['basetable']['alias']) {
                            continue;
                        }

                        if (!in_array($column, array_keys($this->route_query_data))) {
                            $route_query_data[$column]['value'] = null;
                            continue;
                        } else {
                            $route_query_data[$column]['value'] = $this->route_query_data[$column];
                        }

                        $query_data['where'][] = [
                            'table' => $data['table'],
                            'column' => $data['column'],
                            'function' => $data['function'],
                            'value' => $this->route_query_data[$column],
                        ];

                    }

                    $is_none_pattern_a = empty($query_data['where']);
                    $is_none_pattern_a = $is_none_pattern_a && $is_exist_routequery;

                    $is_none_pattern_b = $route_query_subdata['required'];
                    if (!in_array('value', array_keys($route_query_data[$column]))) {
                        continue;
                    }
                    $is_none_pattern_b = $is_none_pattern_b && $route_query_data[$column]['value'] == null;
                    $is_none_pattern_b = $is_none_pattern_b && $is_exist_routequery;

                    $is_none = $is_none_pattern_a || $is_none_pattern_b;
                    if ($is_none) {
                        $query_data['where'][] = [
                            'table' => $data['table'],
                            'column' => $data['column'],
                            'function' => $data['function'],
                            'value' => 'none',
                        ];
                    }
                }
                $this->query_data[$table] = $this->query_model->getQueryData($query_data);
            }
        }
    }

}
