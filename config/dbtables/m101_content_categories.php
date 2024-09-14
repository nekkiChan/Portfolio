<?php
use App\Models\dbtables\M101ContentCategory;

return [
    'table' => 'm101_content_categories',
    'dbmodel' => M101ContentCategory::class,
    'initdata' => [
        0 => [
            'name' => 'profile',
            'view' => 'プロフィール',
        ],
        1 => [
            'name' => 'career',
            'view' => '経歴',
        ],
        2 => [
            'name' => 'works',
            'view' => '実績',
        ],
    ],
];
