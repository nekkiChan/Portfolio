<?php
use App\Models\screens\private\contents\body\list\PrivateContentBodiesListModel;

return [
    // title
    'pagetitle' => [
        'main' => 'ContentsCategoryMenu',
        'view' => 'コンテンツ一覧',
        'transition' => 'コンテンツ一覧',
    ],
    // rolelevel
    'rolelevel' => 999,
    // path
    'routepath' => 'private.contents.body.list.index',
    'jspath' => 'private.contents.body.list.javascript',
    'csspath' => 'private/contents/body/list/index/',
    // model
    'model' => PrivateContentBodiesListModel::class,
    // querydata
    'querydata' => [
        // content_bodies_data
        'content_bodies_data' => [
            'basetable' => [
                'table' => 'd101_content_bodies',
                'alias' => 'd101',
            ],
            'join' => [
                [
                    'table' => 'm102_content_subcategories',
                    'alias' => 'm102',
                    'column' => 'id',
                    'basetable' => 'd101',
                    'basetable_column' => 'content_subcategory_id',
                ],
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
                [
                    'table' => 'd101',
                    'column' => 'sort',
                    'order' => 'asc',
                ],
            ],
        ],
        // service_links_data
        'service_links_data' => [
            'basetable' => [
                'table' => 'd201_service_links',
                'alias' => 'd201',
            ],
            'join' => [
                [
                    'table' => 'm201_service_categories',
                    'alias' => 'm201',
                    'column' => 'id',
                    'basetable' => 'd201',
                    'basetable_column' => 'service_category_id',
                ],
                [
                    'table' => 'd101_content_bodies',
                    'alias' => 'd101',
                    'column' => 'id',
                    'basetable' => 'd201',
                    'basetable_column' => 'content_body_id',
                ],
            ],
            'select' => [
                [
                    'table' => 'd201',
                    'column' => 'id',
                    'alias' => 'id',
                ],
                [
                    'table' => 'm201',
                    'column' => 'name',
                    'alias' => 'name',
                ],
                [
                    'table' => 'm201',
                    'column' => 'view',
                    'alias' => 'view',
                ],
                [
                    'table' => 'd201',
                    'column' => 'link_path',
                    'alias' => 'link_path',
                ],
                [
                    'table' => 'd201',
                    'column' => 'file_path',
                    'alias' => 'file_path',
                ],
                [
                    'table' => 'm201',
                    'column' => 'icon_image_path',
                    'alias' => 'icon_image_path',
                ],
                [
                    'table' => 'd201',
                    'column' => 'service_category_id',
                    'alias' => 'service_category_id',
                ],
                [
                    'table' => 'd201',
                    'column' => 'content_body_id',
                    'alias' => 'content_body_id',
                ],
            ],
            'order' => [
                [
                    'table' => 'd101',
                    'column' => 'sort',
                    'order' => 'asc',
                ],
                [
                    'table' => 'm201',
                    'column' => 'sort',
                    'order' => 'asc',
                ],
            ],
        ],
    ],
];
