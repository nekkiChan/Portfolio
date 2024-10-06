<?php
use App\Models\screens\private\users\menu\UsersMenuModel;
use App\Models\dbtables\S003Owner;

return [
    // title
    'pagetitle' => [
        'main' => 'UsersMenu',
        'view' => 'ユーザーメニュー',
        'transition' => 'ユーザーメニュー',
    ],
    // rolelevel
    'rolelevel' => 999,
    // path
    'routepath' => 'private.users.menu.index',
    'jspath' => 'private.users.menu.javascript',
    'csspath' => 'private/users/menu/index/',
    // model
    'model' => UsersMenuModel::class,
    // querydata
    'querydata' => [
    ],
    // transition_data
    'transition_data' => [
        // users
        'users' => [
            'view' => 'ユーザー情報',
            'data' => [
                'list' => [
                    'routepath' => 'private.users.list.index',
                    'configpath' => 'private.users.list.index',
                    'iconpath' => 'home.svg',
                    'level' => 999,
                ],
                'edit' => [
                    'routepath' => 'private.users.edit.index',
                    'configpath' => 'private.users.edit.index',
                    'iconpath' => 'home.svg',
                    'level' => 999,
                ],
            ],
        ],
    ],
];
