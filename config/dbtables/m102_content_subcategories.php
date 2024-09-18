<?php
use App\Models\dbtables\S001User;
use App\Models\dbtables\M101ContentCategory;
use App\Models\dbtables\M102ContentSubCategory;

return [
    'table' => 'm102_content_subcategories',
    'dbmodel' => M102ContentSubCategory::class,
    'initdata' => [
        0 => [
            'name' => 'profile',
            'view' => 'プロフィール',
            'content_category_id' => [
                'table' => M101ContentCategory::class,
                'data' => [
                    'name' => 'profile',
                    'is_disable' => 'false',
                    'is_delete' => 'false',
                ],
            ],
            'is_admin' => '0',
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
            'name' => 'sub_profile',
            'view' => 'プロフィール（sub）',
            'content_category_id' => [
                'table' => M101ContentCategory::class,
                'data' => [
                    'name' => 'profile',
                    'is_disable' => 'false',
                    'is_delete' => 'false',
                ],
            ],
            'is_admin' => '1',
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
            'name' => 'career',
            'view' => '経歴',
            'content_category_id' => [
                'table' => M101ContentCategory::class,
                'data' => [
                    'name' => 'career',
                    'is_disable' => 'false',
                    'is_delete' => 'false',
                ],
            ],
            'is_admin' => '0',
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
            'name' => 'sub_career',
            'view' => '経歴（sub）',
            'content_category_id' => [
                'table' => M101ContentCategory::class,
                'data' => [
                    'name' => 'career',
                    'is_disable' => 'false',
                    'is_delete' => 'false',
                ],
            ],
            'is_admin' => '1',
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
            'name' => 'works',
            'view' => '実績',
            'content_category_id' => [
                'table' => M101ContentCategory::class,
                'data' => [
                    'name' => 'works',
                    'is_disable' => 'false',
                    'is_delete' => 'false',
                ],
            ],
            'is_admin' => '0',
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
            'name' => 'sub_works',
            'view' => '実績（sub）',
            'content_category_id' => [
                'table' => M101ContentCategory::class,
                'data' => [
                    'name' => 'works',
                    'is_disable' => 'false',
                    'is_delete' => 'false',
                ],
            ],
            'is_admin' => '1',
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
