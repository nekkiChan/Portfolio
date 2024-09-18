<?php
use App\Models\screens\private\owner\PrivateOwnerModel;
use App\Models\dbtables\S003Owner;

return [
    // title
    'pagetitle' => [
        'main' => 'OwnerEdit',
        'view' => 'プロフィール編集',
        'transition' => 'プロフィール編集',
    ],
    // path
    'routepath' => 'private.owner.edit.index',
    'jspath' => 'private/owner/edit/index/',
    'csspath' => 'private/owner/edit/index/',
    'nextpath' => 'private.owner.edit.index',
    'backpath' => 'private.owner.edit.index',
    // model
    'model' => PrivateOwnerModel::class,
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
