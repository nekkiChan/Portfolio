<?php
use App\Models\dbtables\S001User;
use App\Models\dbtables\M101ContentCategory;

return [
    'table' => 'm101_content_categories',
    'dbmodel' => M101ContentCategory::class,
    'initdata' => [
        0 => [
            'name' => 'profile',
            'view' => 'プロフィール',
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
            'name' => 'career',
            'view' => '経歴',
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
            'name' => 'works',
            'view' => '実績',
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
