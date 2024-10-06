<?php

namespace App\Models\screens;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\common\CommonModel;
use App\Models\common\QueryModel;
use Illuminate\Support\Facades\DB;

/**
 * スクリーンモデルクラス
 *
 * このクラスは、リクエストに基づいて設定パス、クエリデータ、ログインユーザーデータの初期化と、アクションの処理を行います。
 * また、ファイルのアップロードや削除、バリデーション、データの更新・挿入などの機能も提供します。
 */
class ScreenModel
{
    /**
     * 設定パス
     *
     * @var string
     */
    protected $config_path;

    /**
     * 設定データ
     *
     * @var array
     */
    protected $config_data;

    /**
     * ルートパス
     *
     * @var string
     */
    protected $route_path;

    /**
     * ルートクエリ
     *
     * @var array
     */
    protected $route_query_data;

    /**
     * コモンモデル
     *
     * @var \App\Models\common\CommonModel
     */
    protected $common_model;

    /**
     * クエリモデル
     *
     * @var \App\Models\common\QueryModel
     */
    protected $query_model;

    /**
     * クエリデータ
     *
     * @var object
     */
    protected $query_data;

    /**
     * ログインユーザー
     *
     * @var object
     */
    protected $login_user;


    /**
     * サイト所有者ユーザー
     *
     * @var object
     */
    protected $owner_data;

    /**
     * コンストラクタ
     *
     * @param \Illuminate\Http\Request $request リクエストオブジェクト
     */
    public function __construct(Request $request)
    {
        $path = $request->getRequestUri();
        $this->route_query_data = [];
        if (!empty($request->query())) {
            $path = explode('?', $path)[0];
            $this->route_query_data = $request->query();
        }
        $this->config_path = config("screens.path.$path");
        $this->config_data = config("screens.$this->config_path");
        $this->route_path = config("screens.$this->config_path.routepath");
        // コモンモデルの初期化
        $this->common_model = new CommonModel();
        // クエリモデルの初期化
        $this->query_model = new QueryModel();
        // ログインユーザーの設定
        $this->setupLoginUserData();
        // 所有者データの設定
        $this->setupOwnerData();
        // クエリデータの設定
        $this->query_data = [];
        $this->setupQueryData();
    }

    /**
     * ログインユーザーデータの設定
     *
     * @return void
     */
    protected function setupLoginUserData()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $base_query_data = config('screens.common.querydata.loginuser');
            $base_query_data['where'][] = [
                'table' => 's001',
                'column' => 'id',
                'value' => $user->id,
                'function' => '=',
            ];

            $this->login_user = $this->query_model->getQueryData($base_query_data)->first();
            session(['login_user' => $this->login_user]);
        }
    }

    /**
     * ログインユーザーデータを取得
     *
     * @return object|null
     */
    public function getLoginUserData()
    {
        return $this->login_user;
    }

    /**
     * 所有者データの設定
     *
     * @return void
     */
    protected function setupOwnerData()
    {
        $base_query_data = config('screens.common.querydata.owner_data');

        $this->owner_data = $this->query_model->getQueryData($base_query_data)->first();
        session(['owner_data' => $this->owner_data]);
    }

    /**
     * 所有者データを取得
     *
     * @return object|null
     */
    public function getOwnerData()
    {
        return $this->owner_data;
    }

    /**
     * 権限レベルによるリダイレクト処理
     *
     *
     */
    public function redirectByRoleLevel()
    {
        // rolelevel
        if (isset($this->config_data['rolelevel'])) {
            if (Auth::check()) {
                $screen_rolelevel = $this->config_data['rolelevel'];
                $user_rolelevel = $this->login_user->level;
                if ($screen_rolelevel > $user_rolelevel) {
                    return redirect()->route('public.mainmenu.index');
                }
            }
        }
        return null;
    }

    /**
     * クエリデータの設定
     *
     * @return void
     */
    protected function setupQueryData()
    {
        if (!empty($this->config_data['querydata'])) {
            $base_query_data = $this->config_data['querydata'];
            $route_query_data = [];
            if (!empty($this->config_data['routequerydata'])) {
                $route_query_data = $this->config_data['routequerydata'];
            }

            foreach ($base_query_data as $table => $query_data) {
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

                    if (!$route_query_subdata['required']) {
                        continue;
                    }

                    $is_none_pattern_a = empty($query_data['where']);
                    $is_none_pattern_a = $is_none_pattern_a && $is_exist_routequery;

                    if (!in_array('value', array_keys($route_query_data[$column]))) {
                        continue;
                    }
                    $is_none_pattern_b = $route_query_data[$column]['value'] == null;
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

    /**
     * クエリデータを取得
     *
     * @return array
     */
    public function getQueryData()
    {
        return $this->query_data;
    }

    /**
     * アクションの処理
     *
     * @param \Illuminate\Http\Request $request リクエストオブジェクト
     * @return \Illuminate\Http\RedirectResponse
     */
    public function action(Request $request)
    {
        switch ($request->input('button')) {
            case 'update':
                return $this->handleUpdate($request);
            case 'back':
                return $this->handleBack($request);
            default:
                return redirect()->back();
        }
    }

    /**
     * 更新処理
     *
     * @param \Illuminate\Http\Request $request リクエストオブジェクト
     * @return \Illuminate\Http\RedirectResponse
     */
    private function handleUpdate(Request $request)
    {
        $tablemodel = new $this->config_data['table']();
        $table = $tablemodel->getTableName();
        $this->handleFileDeletion($request, $table);

        $validator = $this->getValidator($request);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $ids = array_map('intval', $request->input('id'));
        $savedFiles = $this->handleFileUploads($request);

        foreach ($ids as $key => $id) {
            $data = $this->prepareDataForUpdate($request, $key, $savedFiles);
            $this->updateOrInsertData($table, $id, $data);
        }

        if (empty($this->config_data['nextpath'])) {
            return redirect()->back()->with('validate_success', true);
        }

        $view = $this->config_data['nextpath'];
        return redirect()->route($view, $this->route_query_data)->with('validate_success', true);
    }

    /**
     * 戻る処理
     *
     * @param \Illuminate\Http\Request $request リクエストオブジェクト
     * @return \Illuminate\Http\RedirectResponse
     */
    private function handleBack(Request $request)
    {
        if (empty($this->config_data['backpath'])) {
            return redirect()->back();
        }

        $view = $this->config_data['backpath'];

        $view_config_data = config("screens.$view");
        $routequerydata = [];
        if (in_array('routequerydata', array_keys($view_config_data))) {
            $routequerydata = $view_config_data['routequerydata'];
            foreach (array_keys($this->route_query_data) as $column) {
                if (!in_array($column, array_keys($routequerydata))) {
                    unset($this->route_query_data[$column]);
                    continue;
                }
                if (!$routequerydata[$column]['required']) {
                    unset($this->route_query_data[$column]);
                    continue;
                }
            }
        }

        return redirect()->route($view, $this->route_query_data);
    }

    /**
     * ファイル削除処理
     *
     * @param \Illuminate\Http\Request $request リクエストオブジェクト
     * @param string $table テーブル名
     * @return void|bool|\Illuminate\Http\RedirectResponse
     */
    private function handleFileDeletion(Request $request, $table)
    {
        if (empty($this->config_data['file'])) {
            return true;
        }
        if (empty($this->config_data['file']['delete'])) {
            return true;
        }

        $file_delete_flag = $this->config_data['file']["delete"];
        foreach ($file_delete_flag as $file_column => $file_data) {
            $file_flag = $file_data['flag'];
            if (!empty($request->input($file_flag))) {
                $file_table_model = new $file_data['table']();
                $file_table = $file_table_model->getTableName();
                foreach ($request->input($file_flag) as $key => $flag) {
                    if ($flag == 'delete') {
                        $id = $request->input('id')[$key];
                        $file_path = DB::table($file_table)->where('id', $id)->value($file_column);
                        if (!empty($file_path)) {
                            Storage::disk('uploads')->delete($file_path);
                        }
                        DB::table($file_table)->where('id', '=', $id)->update([$file_column => null]);
                        $messages = [
                            'ファイルは正常に削除されました。',
                        ];
                        return redirect()->back()->with('validate_success', $messages);
                    }
                }
            }
        }
    }

    /**
     * バリデータを取得
     *
     * @param \Illuminate\Http\Request $request リクエストオブジェクト
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function getValidator(Request $request)
    {
        $conditions = $this->config_data['validate']['conditions'];
        $messages = $this->config_data['validate']['messages'];

        return Validator::make($request->all(), $conditions, $messages);
    }

    /**
     * ファイルアップロードの処理
     *
     * @param \Illuminate\Http\Request $request リクエストオブジェクト
     * @return array 保存されたファイル情報
     */
    public function handleFileUploads($request)
    {
        $savedFiles = [];

        if (empty($this->config_data['file'])) {
            return $savedFiles;
        }
        if (empty($this->config_data['file']['dirname'])) {
            return $savedFiles;
        }
        if (empty($request->file())) {
            return $savedFiles;
        }

        $file_dirname = $this->config_data['file']['dirname'];

        foreach ($request->file() as $column => $filedata) {
            foreach ($filedata as $key => $file) {
                $timestamp = Carbon::now()->format('YmdHis');
                $extension = $file->getClientOriginalExtension();
                $uniqueId = uniqid();
                $randomString = substr($uniqueId, -3);
                $fileName = $timestamp . '_' . $randomString . '.' . $extension;

                $path = $file->storeAs("/files/{$file_dirname}", $fileName, 'uploads');

                $savedFiles[$key][$column] = [
                    'column' => $column,
                    'name' => $fileName,
                    'path' => $path,
                ];
            }
        }

        return $savedFiles;
    }

    /**
     * リクエストのバリデーション
     *
     * @param \Illuminate\Http\Request $request リクエストオブジェクト
     * @param array $rules バリデーションルール
     * @param array $messages バリデーションメッセージ
     * @return \Illuminate\Http\RedirectResponse|null バリデーションに失敗した場合はリダイレクトレスポンスを返し、成功した場合はnullを返す
     */
    public function validateRequest($request, $rules, $messages)
    {
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        return null;
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

            $data[$column] = $this->processColumnData($column, $inputData);

            switch ($column) {
                case 'password':
                    if ($data[$column] == null) {
                        unset($data[$column]);
                    }
                    break;
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
     * データの更新または挿入
     *
     * @param string $table テーブル名
     * @param array $data データ
     * @param string $id ID
     * @return void
     */
    public function updateOrInsertData($table, $id, $data)
    {
        $upsertdbdata = $this->config_data["upsert"]["dbdata"];
        if (!empty($id)) {
            DB::table($table)->where('id', '=', $id)->update($data);
        } else {
            $data = $this->prepareInsertData($data);
            DB::table($table)->insert($data);
        }
    }

    /**
     * 挿入用のデータ準備
     *
     * @param array $data データ
     * @return array 処理済みデータ
     */
    public function prepareInsertData($data)
    {
        $data['created_at'] = now();
        $data['created_by'] = $this->login_user->id;
        $insertcolumn = $this->config_data["insert"]["column"];

        return $data;
    }

    /**
     * 日付文字列のバリデーション
     *
     * @param string $date_string 日付文字列
     * @return string|null フォーマットに一致する場合は変換後の日付文字列、無効な場合はnull
     */
    public function validate_date($date_string)
    {
        // Y-m-d形式の場合、Y-m-d H:i:sに変換
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date_string)) {
            try {
                $date = Carbon::createFromFormat('Y-m-d', $date_string);
                return $date->format('Y-m-d H:i:s'); // 00:00:00を補完
            } catch (\Exception $e) {
                return null; // 無効な日付の場合はnullを返す
            }
        }

        // Y-m-d H:i:s形式の場合、そのまま返す
        if (preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $date_string)) {
            try {
                $date = Carbon::createFromFormat('Y-m-d H:i:s', $date_string);
                return $date->format('Y-m-d H:i:s');
            } catch (\Exception $e) {
                return null; // 無効な日付の場合はnullを返す
            }
        }

        return null; // フォーマットに一致しない場合はnullを返す
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
