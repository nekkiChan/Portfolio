<?php
use App\Models\dbtables\S002Role;

return [
    'table' => 's002_roles',
    'dbmodel' => S002Role::class,
    'initdata' => [
        0 => [
            'name' => 'システム管理者',
            'level' => 999,
        ],
        1 => [
            'name' => '一般',
            'level' => 1,
        ],
    ],
];
