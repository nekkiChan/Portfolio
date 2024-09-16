<?php
use App\Models\screens\public\PublicMainMenuModel;

return [
    // path
    'routepath' => 'public.mainmenu.index',
    'jspath' => 'public/mainmenu/index/',
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
    ],
];
