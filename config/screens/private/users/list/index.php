<?php
use App\Models\screens\private\users\list\UsersListModel;

return [
    // title
    'pagetitle' => [
        'main' => 'UsersList',
        'view' => 'ユーザー一覧',
        'transition' => 'ユーザー一覧',
    ],
    // path
    'routepath' => 'private.users.list.index',
    'jspath' => 'private.users.list.javascript',
    'csspath' => 'private/users/list/index/',
    // model
    'model' => UsersListModel::class,
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
    ],
];
