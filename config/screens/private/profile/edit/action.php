<?php
use App\Models\screens\private\profile\PrivateProfileModel;
use App\Models\dbtables\S001User;
use App\Models\dbtables\D201ServiceLink;

return [
    // title
    'pagetitle' => [
        'main' => 'ProfileEdit',
        'view' => 'プロフィール編集',
        'transition' => 'プロフィール編集',
    ],
    // path
    'routepath' => 'private.profile.edit.index',
    'jspath' => 'private/profile/edit/index/',
    'csspath' => 'private/profile/edit/index/',
    'nextpath' => 'private.profile.edit.index',
    'backpath' => 'private.profile.edit.index',
    // model
    'model' => PrivateProfileModel::class,
    // table
    'table' => S001User::class,
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
            'password',
        ],
    ],
    // upsert
    'upsert' => [
        'dbdata' => [
            S001User::class => [
                'name',
                'password',
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
            'password.*' => [
                'nullable',
                'string',
            ],
        ],
        'messages' => [
            'name.*.required' => 'ユーザー名は必須です。',
            'name.*.string' => 'ユーザー名は文字列でなければなりません。',
            'password.*.string' => 'パスワードは文字列でなければなりません。',
        ],
    ],
    // file
    'file' => [
        'dirname' => 'users/icon/',
        'delete' => [
            'icon_image_path' => [
                'table' => D201ServiceLink::class,
                'column' => 'icon_image_path',
                'flag' => 'icon_image_path_flag',
            ],
        ],
    ],
];
