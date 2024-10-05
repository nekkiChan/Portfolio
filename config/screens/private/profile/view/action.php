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
    'routepath' => 'private.profile.view.index',
    'jspath' => 'private/profile/view/index/',
    'csspath' => 'private/profile/view/index/',
    'nextpath' => 'private.profile.view.index',
    'backpath' => 'public.mainmenu.index',
    // model
    'model' => PrivateProfileEditModel::class,
    // querydata
    'querydata' => [
    ],
];
