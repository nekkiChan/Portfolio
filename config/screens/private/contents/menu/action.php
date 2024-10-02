<?php
use App\Models\screens\private\contents\menu\PrivateContentsMenuModel;
use App\Models\dbtables\S003Owner;

return [
    // title
    'pagetitle' => [
    ],
    // path
    'routepath' => 'private.contents.menu.index',
    'jspath' => 'private/contents/menu/index/',
    'csspath' => 'private/contents/menu/index/',
    'nextpath' => 'private.contents.menu.index',
    'backpath' => 'public.mainmenu.index',
    // model
    'model' => PrivateContentsMenuModel::class,
    // table
    'table' => S003Owner::class,
    // querydata
    'querydata' => [
    ],
    // insert
    'insert' => [
        'column' => [
        ],
    ],
    // update
    'update' => [
        'column' => [
            'name',
            'profile_icon_path',
            'favicon_icon_path',
        ],
    ],
    'nullable' => [
        'column' => [
            'profile_icon_path',
            'favicon_icon_path',
        ],
    ],
    // upsert
    'upsert' => [
        'dbdata' => [
            S003Owner::class => [
                'name',
                'profile_icon_path',
                'favicon_icon_path',
            ],
        ],
    ],
    // validate
    'validate' => [
        'conditions' => [
            'name.*' => [
                'required',
                'string',
            ],
        ],
        'messages' => [
            'name.*.required' => '所有者名は必須です。',
            'name.*.string' => '所有者名は文字列でなければなりません。',
        ],
    ],
    // file
    'file' => [
        'dirname' => 'owner/icon',
        'delete' => [
            'profile_icon_path' => [
                'table' => S003Owner::class,
                'column' => 'profile_icon_path',
                'flag' => 'profile_icon_path_flag',
            ],
            'favicon_icon_path' => [
                'table' => S003Owner::class,
                'column' => 'favicon_icon_path',
                'flag' => 'favicon_icon_path_flag',
            ],
        ],
    ],
];
