<?php
use App\Models\screens\private\profile\view\PrivateProfileViewModel;

return [
    // title
    'pagetitle' => [
        'main' => 'Profile',
        'view' => 'プロフィール',
        'transition' => 'プロフィール',
    ],
    // path
    'routepath' => 'private.profile.view.index',
    'jspath' => 'private/profile/view/index/',
    'csspath' => 'private/profile/view/index/',
    'nextpath' => 'private.profile.view.index',
    'backpath' => 'public.mainmenu.index',
    // model
    'model' => PrivateProfileViewModel::class,
    // querydata
    'querydata' => [
    ],
];
