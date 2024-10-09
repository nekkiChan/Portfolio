<?php

namespace App\Models\screens\private\contents\body\edit;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\screens\ScreenModel;
use Illuminate\Database\Eloquent\Collection;

class PrivateContentBodiesEditModel extends ScreenModel
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    /**
     * 更新のためのデータ準備
     *
     * @param \Illuminate\Http\Request $request リクエストオブジェクト
     * @param int $key インデックスキー
     * @param array $savedFiles 保存されたファイル情報
     * @return array 更新データ
     */
    protected function prepareDataForUpdate(Request $request, $key, $savedFiles)
    {
        $data = [
            'id' => $request->input('id')[$key],
            'updated_at' => now(),
            'updated_by' => $this->login_user->id,
        ];

        $updateColumns = $this->config_data["update"]["column"];
        $nullableColumns = $this->config_data["nullable"]["column"];

        foreach ($updateColumns as $column) {
            if (isset($data[$column])) {
                continue;
            }

            $inputData = $request->input($column)[$key] ?? null;

            if (in_array($column, $nullableColumns) && $inputData === null) {
                continue;
            }

            switch ($column) {
                case 'sort':
                    $this->handleSortColumn($request, $inputData, $key, $data);
                    break;
                default:
                    $data[$column] = $this->processColumnData($column, $inputData);
            }
        }

        if (!empty($savedFiles[$key])) {
            foreach ($savedFiles[$key] as $filedata) {
                $data[$filedata['column']] = $filedata['path'];
            }
        }

        return $data;
    }

    /**
     * ソートカラムの処理を行う
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $inputData
     * @param int $key
     * @param array &$data
     * @return void
     */
    protected function handleSortColumn(Request $request, $inputData, $key, array &$data)
    {
        $tableModel = $this->config_data['table'];
        $column = 'sort';
        $inputId = $request->input('id')[$key];

        // 新規データの場合
        if ($inputId === null) {
            $dataCount = $tableModel::where('is_disable', false)
                ->where('is_delete', false)
                ->count();

            $data[$column] = $inputData == $dataCount ? $dataCount + 1 : $inputData + 1;

            $tableModel::where('sort', '>=', $data[$column])->increment('sort');
        } else {
            $initContentSubCategoryId = $request->input('content_subcategory_id')[$key];

            // 既存のデータと同じ場合
            $subCategoryDataArray = $tableModel::where('content_subcategory_id', '=', $initContentSubCategoryId)
                ->orderBy('sort', 'asc')
                ->get();

            $oneBeforeSort = $this->getOneBeforeSort($subCategoryDataArray, $inputData);

            $correctData = $tableModel::where('id', '=', $inputId)
                ->where('sort', '=', $oneBeforeSort)->get();

            if ($correctData->count() === 0) {
                $tableModel::where('sort', '>', $inputData)->increment('sort');
                $tableModel::where('id', $inputId)
                    ->update(['sort' => $inputData + 1]);

                $this->reorganizeSort($tableModel);
            }
        }
    }

    /**
     * ソートの前の値を取得する
     *
     * @param \Illuminate\Support\Collection $subCategoryDataArray
     * @param int $inputData
     * @return int
     */
    protected function getOneBeforeSort($subCategoryDataArray, $inputData)
    {
        foreach ($subCategoryDataArray as $subCategoryData) {
            if ($subCategoryData->sort > $inputData) {
                return $subCategoryData->sort;
            }
        }

        return $inputData; // 返すデフォルト値
    }

    /**
     * ソートを再整理する
     *
     * @param string $tableModel
     * @return void
     */
    protected function reorganizeSort($tableModel)
    {
        $subCategoryRecords = DB::table('m102_content_subcategories')
            ->where('is_disable', false)
            ->where('is_delete', false)
            ->orderBy('sort', 'asc')
            ->get();

        $baseQueryData = $tableModel::where('is_disable', false)
            ->where('is_delete', false)
            ->orderBy('sort', 'asc')
            ->get();

        $count = 0;
        foreach ($subCategoryRecords as $subCategoryRecord) {
            $records = $baseQueryData->where('content_subcategory_id', $subCategoryRecord->id);
            foreach ($records as $record) {
                $count++;
                $tableModel::where('id', $record->id)->update(['sort' => $count]);
            }
        }
    }

    /**
     * カラムデータの処理
     *
     * このメソッドは、指定されたカラムに応じてデータを処理します。
     * 日付カラムのデータは、日付形式に変換されます。
     * JSON形式のデータは、JSON文字列にエンコードされます。
     * 特定のカラム（例: 'name'）では、前後の空白が削除されます。
     * その他のデータは、そのまま返されます。
     *
     * @param string $column カラム名。どのカラムのデータを処理するかを指定します。
     * @param mixed $data 入力データ。処理対象のデータです。
     *
     * @return mixed 処理後のデータ。カラムに応じた形式で返されます。
     * - 日付カラムの場合は、'Y-m-d H:i:s' 形式の文字列。
     * - JSON形式のデータの場合は、JSONエンコードされた文字列。
     * - 特定のカラム（例: 'name'）では、前後の空白が削除された文字列。
     * - その他の場合は、そのままのデータ。
     */
    protected function processColumnData($column, $data)
    {
        // 例: 日付カラムの場合、日付形式に変換
        switch ($column) {
            case 'date':
                return $this->validate_date($data);
            case 'password':
                if (empty($data)) {
                    return null;
                }
                return $this->common_model->generatePassword($data);
        }

        // 例: JSON形式のデータの場合、JSONにエンコード
        if (is_array($data)) {
            return json_encode($data);
        }

        $data = str_replace(array("\r\n", "\r", "\n", "&nbsp;"), '', $data);

        // デフォルトの処理
        return $data;
    }
}
