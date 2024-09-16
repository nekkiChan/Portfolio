<?php
use App\Models\dbtables\S001User;
use App\Models\dbtables\S002Role;

return [
    'table' => 's001_users',
    'dbmodel' => S001User::class,
    'initdata' => [
        0 => [
            'name' => env("USER_NAME", "nekkichan"),
            'password' => env("USER_PASSWORD", "password"),
            'role_id' => [
                'table' => S002Role::class,
                'data' => [
                    'level' => env("USER_ROLE_LEVEL", '999'),
                    'is_disable' => 'false',
                    'is_delete' => 'false',
                ],
            ],
        ],
    ],
];
