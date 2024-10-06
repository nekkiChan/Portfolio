<?php
use App\Models\dbtables\S001User;
use App\Models\dbtables\M201ServiceCategory;

return [
    'table' => 'm201_service_categoris',
    'dbmodel' => M201ServiceCategory::class,
    'initdata' => [
        0 => [
            'name' => 'this_site',
            'view' => '本サービス',
            'icon_image_path' => 'home.svg',
            'created_by' => [
                'table' => S001User::class,
                'data' => [
                    'name' => env("USER_NAME", 'nekkichan'),
                    'is_disable' => 'false',
                    'is_delete' => 'false',
                ],
            ],
        ],
        1 => [
            'name' => 'twitter',
            'view' => 'X（旧Twitter）',
            'icon_image_path' => 'twitter.svg',
            'created_by' => [
                'table' => S001User::class,
                'data' => [
                    'name' => env("USER_NAME", 'nekkichan'),
                    'is_disable' => 'false',
                    'is_delete' => 'false',
                ],
            ],
        ],
        2 => [
            'name' => 'instagram',
            'view' => 'instagram',
            'icon_image_path' => 'instagram.svg',
            'created_by' => [
                'table' => S001User::class,
                'data' => [
                    'name' => env("USER_NAME", 'nekkichan'),
                    'is_disable' => 'false',
                    'is_delete' => 'false',
                ],
            ],
        ],
        3 => [
            'name' => 'github',
            'view' => 'github',
            'icon_image_path' => 'github.svg',
            'created_by' => [
                'table' => S001User::class,
                'data' => [
                    'name' => env("USER_NAME", 'nekkichan'),
                    'is_disable' => 'false',
                    'is_delete' => 'false',
                ],
            ],
        ],
        4 => [
            'name' => 'googledrive',
            'view' => 'GoogleDrive',
            'icon_image_path' => 'googledrive.svg',
            'created_by' => [
                'table' => S001User::class,
                'data' => [
                    'name' => env("USER_NAME", 'nekkichan'),
                    'is_disable' => 'false',
                    'is_delete' => 'false',
                ],
            ],
        ],
        5 => [
            'name' => 'current_site',
            'view' => '該当サイト',
            'icon_image_path' => 'link.svg',
            'created_by' => [
                'table' => S001User::class,
                'data' => [
                    'name' => env("USER_NAME", 'nekkichan'),
                    'is_disable' => 'false',
                    'is_delete' => 'false',
                ],
            ],
        ],
        6 => [
            'name' => 'other_site',
            'view' => 'その他',
            'icon_image_path' => 'link.svg',
            'created_by' => [
                'table' => S001User::class,
                'data' => [
                    'name' => env("USER_NAME", 'nekkichan'),
                    'is_disable' => 'false',
                    'is_delete' => 'false',
                ],
            ],
        ],
    ],
];
