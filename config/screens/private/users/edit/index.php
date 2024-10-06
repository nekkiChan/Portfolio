<?php
use App\Models\screens\private\users\edit\UsersEditModel;

return [
    // title
    'pagetitle' => [
        'main' => 'ContentsMenu',
        'view' => 'ユーザー編集',
        'transition' => 'ユーザー追加',
    ],
    // unique
    'unique' => [
        'name' => [
            'class' => 'name',
            'table' => 's001_users',
            'column' => 'name',
        ],
        'email' => [
            'class' => 'email',
            'table' => 's001_users',
            'column' => 'email',
        ],
    ],
    // rolelevel
    'rolelevel' => 999,
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
                    'column' => 'role_id',
                    'alias' => 'role_id',
                ],
                [
                    'table' => 's001',
                    'column' => 'is_disable',
                    'alias' => 'is_disable',
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
        // roles_data
        'roles_data' => [
            'basetable' => [
                'table' => 's002_roles',
                'alias' => 's002',
            ],
            'select' => [
                [
                    'table' => 's002',
                    'column' => 'id',
                    'alias' => 'id',
                ],
                [
                    'table' => 's002',
                    'column' => 'name',
                    'alias' => 'name',
                ],
                [
                    'table' => 's002',
                    'column' => 'level',
                    'alias' => 'level',
                ],
            ],
            'order' => [
                [
                    'table' => 's002',
                    'column' => 'level',
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
