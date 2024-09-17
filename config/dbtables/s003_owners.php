<?php
use App\Models\dbtables\S001User;
use App\Models\dbtables\S003Owner;

return [
    'table' => 's003_owners',
    'dbmodel' => S003Owner::class,
    'initdata' => [
        0 => [
            'name' => env("OWNER_NAME", "nekkichan"),
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
