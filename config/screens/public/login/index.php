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
];
