<?php

namespace App\Models\screens\private;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\screens\ScreenModel;

class PrivateProfileModel extends ScreenModel
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function getValidator(Request $request)
    {
        $conditions = [
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];

        $messages = [
            'name.required' => 'ユーザー名は必須です。',
            'name.string' => 'ユーザー名は文字列でなければなりません。',
            'password.required' => 'パスワードは必須です。',
            'password.string' => 'パスワードは文字列でなければなりません。',
        ];

        return Validator::make($request->all(), $conditions, $messages);
    }

    
}
