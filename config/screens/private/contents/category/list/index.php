<?php
use App\Models\screens\private\contents\category\list\PrivateContentsCategoryListModel;

return [
    // title
    'pagetitle' => [
        'main' => 'ContentsCategoryMenu',
        'view' => 'コンテンツカテゴリ一覧',
        'transition' => 'コンテンツカテゴリ一覧',
    ],
    // path
    'routepath' => 'private.contents.category.list.index',
    'jspath' => 'private.contents.category.list.javascript',
    'csspath' => 'private/contents/category/list/index/',
    // model
    'model' => PrivateContentsCategoryListModel::class,
    // querydata
    'querydata' => [
        // contents_category
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
                    'column' => 'is_admin',
                    'alias' => 'is_admin',
                ],
            ],
        ],
    ],
];
