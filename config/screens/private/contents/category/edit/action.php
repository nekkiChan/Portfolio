<?php
use App\Models\screens\private\contents\category\edit\PrivateContentsCategoryEditModel;
use App\Models\dbtables\M101ContentCategory;

return [
    // title
    'pagetitle' => [
    ],
    // path
    'routepath' => 'private.contents.category.edit.index',
    'jspath' => 'private/contents/category/edit/index/',
    'csspath' => 'private/contents/category/edit/index/',
    'nextpath' => 'private.contents.category.list.index',
    'backpath' => 'private.contents.category.list.index',
    // model
    'model' => PrivateContentsCategoryEditModel::class,
    // table
    'table' => M101ContentCategory::class,
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
            'view',
            'is_admin',
            'sort',
        ],
    ],
    'nullable' => [
        'column' => [
        ],
    ],
    // upsert
    'upsert' => [
        'dbdata' => [
            M101ContentCategory::class => [
                'name',
                'view',
                'is_admin',
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
            'view.*' => [
                'required',
                'string',
            ],
        ],
        'messages' => [
            'name.*.required' => 'カテゴリ名は必須です。',
            'name.*.string' => 'カテゴリ名は文字列でなければなりません。',
            'view.*.required' => 'カテゴリ名（表示）は必須です。',
            'view.*.string' => 'カテゴリ名（表示）は文字列でなければなりません。',
        ],
    ],
];
