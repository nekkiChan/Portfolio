<?php
use App\Models\screens\private\contents\subcategory\list\PrivateContentsSubCategoryListModel;

return [
    // title
    'pagetitle' => [
        'main' => 'ContentsSubCategoryIndex',
        'view' => 'コンテンツサブカテゴリ一覧',
        'transition' => 'コンテンツサブカテゴリ一覧',
    ],
    // rolelevel
    'rolelevel' => 999,
    // path
    'routepath' => 'private.contents.subcategory.list.index',
    'jspath' => 'private.contents.subcategory.list.javascript',
    'csspath' => 'private/contents/subcategory/list/index/',
    // model
    'model' => PrivateContentsSubCategoryListModel::class,
    // querydata
    'querydata' => [
        // contents_subcategory
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
    ],
    // routequerydata
    'routequerydata' => [
        'category_id' => [
            'required' => false,
            'data' => [
                'contents_subcategories_data' => [
                    'table' => 'm102',
                    'column' => 'category_id',
                    'function' => '=',
                ],
            ],
        ],
    ],
];
