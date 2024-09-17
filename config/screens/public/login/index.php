<?php
use App\Models\screens\public\PublicLoginModel;

return [
    // title
    'pagetitle' => [
        'main' => 'Login',
        'view' => 'ログイン',
        'transition' => 'ログイン',
    ],
    // path
    'routepath' => 'auth.origin.login.index',
    'jspath' => 'auth/origin/login/',
    'csspath' => 'public/login/index/',
    // model
    'model' => PublicLoginModel::class,
    // validate
    'validate' => [
        'conditions' => [
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ],
        'messages' => [
            'name.required' => 'ユーザー名は必須です。',
            'name.string' => 'ユーザー名は文字列でなければなりません。',
            'password.required' => 'パスワードは必須です。',
            'password.string' => 'パスワードは文字列でなければなりません。',
        ],
    ],
];
