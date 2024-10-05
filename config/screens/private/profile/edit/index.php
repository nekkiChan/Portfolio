<?php
use App\Models\screens\private\profile\edit\PrivateProfileEditModel;

return [
    // title
    'pagetitle' => [
        'main' => 'ProfileEdit',
        'view' => 'プロフィール編集',
        'transition' => 'プロフィール編集',
    ],
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
