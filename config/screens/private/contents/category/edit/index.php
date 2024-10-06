<?php
use App\Models\screens\private\contents\category\edit\PrivateContentsCategoryEditModel;

return [
    // title
    'pagetitle' => [
        'main' => 'ContentsMenu',
        'view' => 'コンテンツカテゴリ追加',
        'transition' => 'コンテンツカテゴリ追加',
    ],
    // rolelevel
    'rolelevel' => 999,
    // path
    'routepath' => 'private.contents.category.edit.index',
    'jspath' => 'private.contents.category.edit.javascript',
    'csspath' => 'private/contents/category/edit/index/',
    // model
    'model' => PrivateContentsCategoryEditModel::class,
    // querydata
    'querydata' => [
        // contents_category_data
        'contents_categories_data' => [
            'basetable' => [
                'table' => 'm101_content_categories',
                'alias' => 'm101',
            ],
            'select' => [
                [
                    'table' => 'm101',
                    'column' => 'id',
                    'alias' => 'id',
                ],
                [
                    'table' => 'm101',
                    'column' => 'name',
                    'alias' => 'name',
                ],
                [
                    'table' => 'm101',
                    'column' => 'view',
                    'alias' => 'view',
                ],
                [
                    'table' => 'm101',
                    'column' => 'sort',
                    'alias' => 'sort',
                ],
                [
                    'table' => 'm101',
                    'column' => 'is_admin',
                    'alias' => 'is_admin',
                ],
            ],
        ],
        // contents_category_sumdata
        'contents_categories_sumdata' => [
            'basetable' => [
                'table' => 'm101_content_categories',
                'alias' => 'm101',
            ],
            'select' => [
                [
                    'table' => 'm101',
                    'column' => 'id',
                    'alias' => 'id',
                ],
            ],
        ],
    ],
    // routequerydata
    'routequerydata' => [
        'id' => [
            'required' => true,
            'data' => [
                'contents_categories_data' => [
                    'table' => 'm101',
                    'column' => 'id',
                    'function' => '=',
                ],
            ],
        ],
    ],
];
