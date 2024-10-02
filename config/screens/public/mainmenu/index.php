<?php
use App\Models\screens\public\PublicMainMenuModel;

return [
    // title
    'pagetitle' => [
        'main' => 'MainMenu',
        'view' => 'メインページ',
        'transition' => 'メインページ',
    ],
    // path
    'routepath' => 'public.mainmenu.index',
    'jspath' => 'public.mainmenu.javascript',
    'csspath' => 'public/mainmenu/index/',
    // model
    'model' => PublicMainMenuModel::class,
    // querydata
    'querydata' => [
        // m101_content_categories
        'content_categories_data' => [
            'basetable' => [
                'table' => 'm101_content_categories',
                'alias' => 'm101',
            ],
            'select' => [
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
            'order' => [
                [
                    'table' => 'm101',
                    'column' => 'sort',
                    'order' => 'asc',
                ],
            ],
        ],
        // m102_content_sub_categories
        'content_sub_categories_data' => [
            'basetable' => [
                'table' => 'm102_content_subcategories',
                'alias' => 'm102',
            ],
            'join' => [
                [
                    'table' => 'm101_content_categories',
                    'alias' => 'm101',
                    'column' => 'id',
                    'basetable' => 'm102',
                    'basetable_column' => 'content_category_id',
                ],
            ],
            'select' => [
                [
                    'table' => 'm101',
                    'column' => 'name',
                    'alias' => 'parent_name',
                ],
                [
                    'table' => 'm101',
                    'column' => 'view',
                    'alias' => 'parent_view',
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
            ],
            'order' => [
                [
                    'table' => 'm101',
                    'column' => 'sort',
                    'order' => 'asc',
                ],
                [
                    'table' => 'm102',
                    'column' => 'sort',
                    'order' => 'asc',
                ],
            ],
        ],
    ],
];
