<?php
use App\Models\screens\private\profile\PrivateProfileModel;

return [
    // title
    'pagetitle' => [
        'main' => 'ProfileEdit',
        'view' => 'プロフィール編集',
        'transition' => 'プロフィール編集',
    ],
    // path
    'routepath' => 'private.profile.edit.index',
    'jspath' => 'private/profile/edit/index/',
    'csspath' => 'private/profile/edit/index/',
    // model
    'model' => PrivateProfileModel::class,
    // querydata
    'querydata' => [
    ],
];
