<?php
use App\Models\screens\private\contents\body\edit\PrivateContentBodiesEditModel;

return [
    // title
    'pagetitle' => [
        'main' => 'ContentsMenu',
        'view' => 'コンテンツ編集',
        'transition' => 'コンテンツ編集',
    ],
    // path
    'routepath' => 'private.contents.body.edit.index',
    'jspath' => 'private.contents.body.edit.javascript',
    'csspath' => 'private/contents/body/edit/index/',
    // model
    'model' => PrivateContentBodiesEditModel::class,
    // querydata
    'querydata' => [
        // content_bodies_data
        'content_bodies_data' => [
            'basetable' => [
                'table' => 'd101_content_bodies',
                'alias' => 'd101',
            ],
            'select' => [
                [
                    'table' => 'd101',
                    'column' => 'id',
                    'alias' => 'id',
                ],
                [
                    'table' => 'd101',
                    'column' => 'name',
                    'alias' => 'name',
                ],
                [
                    'table' => 'd101',
                    'column' => 'title',
                    'alias' => 'title',
                ],
                [
                    'table' => 'd101',
                    'column' => 'body',
                    'alias' => 'body',
                ],
                [
                    'table' => 'd101',
                    'column' => 'sort',
                    'alias' => 'sort',
                ],
                [
                    'table' => 'd101',
                    'column' => 'is_admin',
                    'alias' => 'is_admin',
                ],
                [
                    'table' => 'd101',
                    'column' => 'content_subcategory_id',
                    'alias' => 'content_subcategory_id',
                ],
            ],
        ],
        // content_bodies_sumdata
        'content_bodies_sumdata' => [
            'basetable' => [
                'table' => 'd101_content_bodies',
                'alias' => 'd101',
            ],
            'select' => [
                [
                    'table' => 'd101',
                    'column' => 'id',
                    'alias' => 'id',
                ],
                [
                    'table' => 'd101',
                    'column' => 'title',
                    'alias' => 'title',
                ],
            ],
            'order' => [
                [
                    'table' => 'd101',
                    'column' => 'id',
                    'order' => 'asc',
                ],
            ],
        ],
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
                    'column' => 'view',
                    'alias' => 'view',
                ],
            ],
        ],
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
                    'column' => 'content_category_id',
                    'alias' => 'content_category_id',
                ],
                [
                    'table' => 'm102',
                    'column' => 'view',
                    'alias' => 'view',
                ],
            ],
        ],
    ],
    // routequerydata
    'routequerydata' => [
        'body' => [
            'required' => true,
            'data' => [
                'content_bodies_data' => [
                    'table' => 'd101',
                    'column' => 'id',
                    'function' => '=',
                ],
            ],
        ],
        'subcategory' => [
            'required' => true,
            'data' => [
                'content_bodies_sumdata' => [
                    'table' => 'd101',
                    'column' => 'content_subcategory_id',
                    'function' => '=',
                ],
            ],
        ],
    ],
];
