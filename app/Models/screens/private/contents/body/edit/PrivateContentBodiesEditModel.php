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
     * @param array $ids IDリスト
     * @return array 更新データ
     */
    protected function prepareDataForUpdate(Request $request, $key, $savedFiles)
    {
        $data = [
            'id' => $request->input('id')[$key],
            'updated_at' => now(),
            'updated_by' => $this->login_user->id,
        ];

        $updatecolumn = $this->config_data["update"]["column"];
        $nullablecolumn = $this->config_data["nullable"]["column"];

        foreach ($updatecolumn as $column) {
            if (isset($data[$column]))
                continue;

            $inputData = $request->input($column)[$key] ?? null;

            if (in_array($column, $nullablecolumn))
                if ($inputData == null)
                    continue;

            switch ($column) {
                case 'sort':
                    $tablemodel = $this->config_data['table'];
                    $initId = $request->input('id')[$key];

                    if ($initId == null) {
                        $inputData = $tablemodel::count() + 1;
                        break;
                    }

                    $initdata = $tablemodel::where('id', '=', $initId)
                        ->where($column, '=', $inputData + 1)->get();
                    if ($initdata->count() > 0) {
                        break;
                    }

                    $initdata = $tablemodel::where('id', '=', $initId)
                        ->where('content_subcategory_id', '=', $request->input('content_subcategory_id')[$key])
                        ->first();
                    $initsort = $tablemodel::all()->sortByDesc('sort')->first()->sort + 1;
                    if (!empty($initdata)) {
                        $initsort = $initdata->sort;
                    }
                    $replacedata = $tablemodel::where($column, '=', $inputData)->first();

                    if ($replacedata->sort < $initsort) {
                        $tablemodel::where($column, '>', $replacedata->sort)
                            ->where($column, '<', $initsort)
                            ->increment($column);
                        $inputData += 1;
                    } else {
                        $tablemodel::where($column, '>', $initsort)
                            ->where($column, '<=', $replacedata->sort)
                            ->decrement($column);
                    }

                    break;
            }

            $data[$column] = $this->processColumnData($column, $inputData);
        }

        if (!empty($savedFiles[$key])) {
            foreach ($savedFiles[$key] as $filedata) {
                $data[$filedata['column']] = $filedata['path'];
            }
        }
        return $data;
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
