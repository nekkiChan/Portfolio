<?php

namespace App\Models\screens\private\contents\body\edit;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\screens\ScreenModel;

class PrivateContentBodiesEditModel extends ScreenModel
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
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

        return $data;
    }
}
