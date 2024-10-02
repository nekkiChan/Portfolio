<?php
use App\Models\screens\private\contents\body\edit\PrivateContentBodiesEditModel;
use App\Models\dbtables\D101ContentBody;

return [
    // title
    'pagetitle' => [
    ],
    // path
    'routepath' => 'private.contents.body.edit.index',
    'jspath' => 'private/contents/body/edit/index/',
    'csspath' => 'private/contents/body/edit/index/',
    'nextpath' => 'private.contents.body.list.index',
    'backpath' => 'private.contents.body.list.index',
    // model
    'model' => PrivateContentBodiesEditModel::class,
    // table
    'table' => D101ContentBody::class,
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
            'title',
            'body',
            'sort',
            'is_admin',
            'content_subcategory_id',
        ],
    ],
    'nullable' => [
        'column' => [
        ],
    ],
    // upsert
    'upsert' => [
        'dbdata' => [
            D101ContentBody::class => [
                'name',
                'title',
                'body',
                'sort',
                'is_admin',
                'content_subcategory_id',
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
            'title.*' => [
                'required',
                'string',
            ],
        ],
        'messages' => [
            'name.*.required' => '名前は必須です。',
            'name.*.string' => '名前は文字列でなければなりません。',
            'title.*.required' => 'タイトルは必須です。',
            'title.*.string' => 'タイトルは文字列でなければなりません。',
        ],
    ],
];
