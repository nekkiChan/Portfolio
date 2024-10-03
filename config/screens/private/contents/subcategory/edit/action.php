<?php
use App\Models\screens\private\contents\subcategory\edit\PrivateContentsSubCategoryEditModel;
use App\Models\dbtables\M102ContentSubCategory;

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
    'model' => PrivateContentsSubCategoryEditModel::class,
    // table
    'table' => M102ContentSubCategory::class,
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
            'content_category_id',
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
            M102ContentSubCategory::class => [
                'name',
                'view',
                'sort',
                'content_category_id',
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
            'name.*.required' => 'サブカテゴリ名は必須です。',
            'name.*.string' => 'サブカテゴリ名は文字列でなければなりません。',
            'view.*.required' => 'サブカテゴリ名（表示）は必須です。',
            'view.*.string' => 'サブカテゴリ名（表示）は文字列でなければなりません。',
        ],
    ],
];
