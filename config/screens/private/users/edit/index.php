<?php
use App\Models\screens\private\users\edit\UsersEditModel;

return [
    // title
    'pagetitle' => [
        'main' => 'ContentsMenu',
        'view' => 'ユーザー編集',
        'transition' => 'ユーザー追加',
    ],
    // path
    'routepath' => 'private.users.edit.index',
    'jspath' => 'private.users.edit.javascript',
    'csspath' => 'private/users/edit/index/',
    // model
    'model' => UsersEditModel::class,
    // querydata
    'querydata' => [
        // users_data
        'users_data' => [
            'basetable' => [
                'table' => 's001_users',
                'alias' => 's001',
            ],
            'select' => [
                [
                    'table' => 's001',
                    'column' => 'id',
                    'alias' => 'id',
                ],
                [
                    'table' => 's001',
                    'column' => 'name',
                    'alias' => 'name',
                ],
                [
                    'table' => 's001',
                    'column' => 'password',
                    'alias' => 'password',
                ],
                [
                    'table' => 's001',
                    'column' => 'email',
                    'alias' => 'email',
                ],
                [
                    'table' => 's001',
                    'column' => 'disable',
                    'alias' => 'disable',
                ],
            ],
            'order' => [
                [
                    'table' => 's001',
                    'column' => 'id',
                    'order' => 'asc',
                ],
            ],
        ],
    ],
    // routequerydata
    'routequerydata' => [
        'user' => [
            'required' => true,
            'data' => [
                'users_data' => [
                    'table' => 's001',
                    'column' => 'id',
                    'function' => '=',
                ],
            ],
        ],
    ],
];
