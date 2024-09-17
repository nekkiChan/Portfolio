<?php
return [
    // querydata
    'querydata' => [
        // loginuser
        'loginuser' => [
            'basetable' => [
                'table' => 's001_users',
                'alias' => 's001',
            ],
            'join' => [
                [
                    'table' => 's002_roles',
                    'alias' => 's002',
                    'column' => 'id',
                    'basetable' => 's001',
                    'basetable_column' => 'role_id',
                ],
            ],
            'select' => [
                [
                    'table' => 's001',
                    'column' => 'id',
                    'alias' => 'id',
                ],
                [
                    'table' => 's001',
                    'column' => 'name',
                    'alias' => 'name',
                ],
                [
                    'table' => 's001',
                    'column' => 'email',
                    'alias' => 'email',
                ],
                [
                    'table' => 's001',
                    'column' => 'role_id',
                    'alias' => 'role_id',
                ],
                [
                    'table' => 's002',
                    'column' => 'level',
                    'alias' => 'level',
                ],
            ],
            'order' => [
                [
                    'table' => 's001',
                    'column' => 'id',
                    'order' => 'asc',
                ],
            ],
            'limit' => [
                'count' => 1,
            ]
        ],
    ],
];
