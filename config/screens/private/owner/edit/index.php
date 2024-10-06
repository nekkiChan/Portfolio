<?php
use App\Models\screens\private\owner\PrivateOwnerModel;
use App\Models\dbtables\S003Owner;

return [
    // title
    'pagetitle' => [
        'main' => 'OwnerEdit',
        'view' => 'サイトデータ編集',
        'transition' => 'サイトデータ編集',
    ],
    // rolelevel
    'rolelevel' => 999,
    // path
    'routepath' => 'private.owner.edit.index',
    'jspath' => 'private.owner.edit.javascript',
    'csspath' => 'private/owner/edit/index/',
    // model
    'model' => PrivateOwnerModel::class,
    // querydata
    'querydata' => [
        // owners_data
        'owners_data' => [
            'basetable' => [
                'table' => 's003_owners',
                'alias' => 's003',
            ],
            'select' => [
                [
                    'table' => 's003',
                    'column' => 'id',
                    'alias' => 'id',
                ],
                [
                    'table' => 's003',
                    'column' => 'name',
                    'alias' => 'name',
                ],
                [
                    'table' => 's003',
                    'column' => 'profile_icon_path',
                    'alias' => 'profile_icon_path',
                ],
                [
                    'table' => 's003',
                    'column' => 'favicon_icon_path',
                    'alias' => 'favicon_icon_path',
                ],
            ],
            'order' => [
                [
                    'table' => 's003',
                    'column' => 'id',
                    'order' => 'asc',
                ],
            ],
            'limit' => [
                'count' => 1,
            ],
        ],
    ],
    // file
    'file' => [
        'dirname' => 'owner/icon',
        'delete' => [
            'profile_icon_path' => [
                'table' => S003Owner::class,
                'column' => 'profile_icon_path',
                'flag' => 'profile_icon_path_flag',
            ],
            'favicon_icon_path' => [
                'table' => S003Owner::class,
                'column' => 'favicon_icon_path',
                'flag' => 'favicon_icon_path_flag',
            ],
        ],
    ],
];
