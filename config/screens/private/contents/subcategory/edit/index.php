<?php
use App\Models\screens\private\contents\subcategory\edit\PrivateContentsSubCategoryEditModel;

return [
    // title
    'pagetitle' => [
        'main' => 'ContentsSubCategoryEdit',
        'view' => 'コンテンツサブカテゴリ追加',
        'transition' => 'コンテンツサブカテゴリ追加',
    ],
    // rolelevel
    'rolelevel' => 999,
    // path
    'routepath' => 'private.contents.subcategory.edit.index',
    'jspath' => 'private.contents.subcategory.edit.javascript',
    'csspath' => 'private/contents/subcategory/edit/index/',
    // model
    'model' => PrivateContentsSubCategoryEditModel::class,
    // querydata
    'querydata' => [
        // contents_subcategory_data
        'contents_subcategories_data' => [
            'basetable' => [
                'table' => 'm102_content_subcategories',
                'alias' => 'm102',
            ],
            'select' => [
                [
                    'table' => 'm102',
                    'column' => 'id',
                    'alias' => 'id',
                ],
                [
                    'table' => 'm102',
                    'column' => 'name',
                    'alias' => 'name',
                ],
                [
                    'table' => 'm102',
                    'column' => 'view',
                    'alias' => 'view',
                ],
                [
                    'table' => 'm102',
                    'column' => 'sort',
                    'alias' => 'sort',
                ],
                [
                    'table' => 'm102',
                    'column' => 'is_admin',
                    'alias' => 'is_admin',
                ],
                [
                    'table' => 'm102',
                    'column' => 'content_category_id',
                    'alias' => 'content_category_id',
                ],
            ],
        ],
        // contents_categories_data
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
            ],
        ],
        // contents_subcategory_sumdata
        'contents_subcategories_sumdata' => [
            'basetable' => [
                'table' => 'm102_content_subcategories',
                'alias' => 'm102',
            ],
            'select' => [
                [
                    'table' => 'm102',
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
                'contents_subcategories_data' => [
                    'table' => 'm102',
                    'column' => 'id',
                    'function' => '=',
                ],
            ],
        ],
    ],
];
