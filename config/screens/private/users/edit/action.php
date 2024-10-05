<?php
use App\Models\screens\private\users\edit\UsersEditModel;
use App\Models\dbtables\S001User;

return [
    // title
    'pagetitle' => [
    ],
    // path
    'routepath' => 'private.users.edit.index',
    'jspath' => 'private/users/edit/index/',
    'csspath' => 'private/users/edit/index/',
    'nextpath' => 'private.users.list.index',
    'backpath' => 'private.users.list.index',
    // model
    'model' => UsersEditModel::class,
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
            'email',
            'role_id',
            'password',
            'is_disable',
        ],
    ],
    // nullable
    'nullable' => [
        'column' => [
            'password',
        ],
    ],
    // upsert
    'upsert' => [
        'dbdata' => [
            S001User::class => [
                'name',
                'email',
                'role_id',
                'password',
                'is_disable',
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
            'email.*' => [
                'nullable',
                'email',
            ],
        ],
        'messages' => [
            'name.*.required' => 'ユーザー名は必須です。',
            'name.*.string' => 'ユーザー名は文字列でなければなりません。',
            'password.*.string' => 'パスワードは文字列でなければなりません。',
            'email.*.email' => 'メールアドレスを正しく入力してください。',
        ],
    ],
];
