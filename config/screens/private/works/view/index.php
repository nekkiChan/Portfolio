<?php
use App\Models\screens\private\profile\edit\PrivateProfileEditModel;

return [
    // title
    'pagetitle' => [
        'main' => 'Works',
        'view' => '実績',
        'transition' => '実績',
    ],
    // path
    'routepath' => 'private.profile.view.index',
    'jspath' => 'private.profile.view.javascript',
    'csspath' => 'private/profile/view/index/',
    // model
    'model' => PrivateProfileEditModel::class,
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
                    'table' => 'm101',
                    'column' => 'name',
                    'alias' => 'category_name',
                ],
                [
                    'table' => 'm101',
                    'column' => 'view',
                    'alias' => 'category_view',
                ],
                [
                    'table' => 'm102',
                    'column' => 'name',
                    'alias' => 'subcategory_name',
                ],
                [
                    'table' => 'm102',
                    'column' => 'view',
                    'alias' => 'subcategory_view',
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
            'where' => [
                [
                    'table' => 'm102',
                    'column' => 'is_admin',
                    'function' => '=',
                    'value' => false,
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
                [
                    'table' => 'm102_content_subcategories',
                    'alias' => 'm102',
                    'column' => 'id',
                    'basetable' => 'd101',
                    'basetable_column' => 'content_subcategory_id',
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
                    'table' => 'm102',
                    'column' => 'id',
                    'alias' => 'content_subcategory_id',
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
                [
                    'table' => 'd201',
                    'column' => 'is_admin',
                    'alias' => 'is_admin',
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
            'where' => [
                [
                    'table' => 'm102',
                    'column' => 'is_admin',
                    'function' => '=',
                    'value' => false,
                ],
            ],
        ],
    ],
];
