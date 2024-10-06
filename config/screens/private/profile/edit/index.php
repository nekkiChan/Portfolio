<?php
use App\Models\screens\private\profile\edit\PrivateProfileEditModel;

return [
    // title
    'pagetitle' => [
        'main' => 'ProfileEdit',
        'view' => 'プロフィール編集',
        'transition' => 'プロフィール編集',
    ],
    // unique
    'unique' => [
        'name' => [
            'class' => 'name',
            'table' => 's001_users',
            'column' => 'name',
        ],
        'email' => [
            'class' => 'email',
            'table' => 's001_users',
            'column' => 'email',
        ],
    ],
    // rolelevel
    'rolelevel' => 1,
    // path
    'routepath' => 'private.profile.edit.index',
    'jspath' => 'private.profile.edit.javascript',
    'csspath' => 'private/profile/edit/index/',
    // model
    'model' => PrivateProfileEditModel::class,
    // querydata
    'querydata' => [
    ],
];
