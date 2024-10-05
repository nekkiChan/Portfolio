<?php
use App\Models\screens\private\works\view\PrivateWorksViewModel;

return [
    // title
    'pagetitle' => [
        'main' => 'Works',
        'view' => '実績',
        'transition' => '実績',
    ],
    // path
    'routepath' => 'private.profile.view.index',
    'jspath' => 'private/profile/view/index/',
    'csspath' => 'private/profile/view/index/',
    'nextpath' => 'private.profile.view.index',
    'backpath' => 'public.mainmenu.index',
    // model
    'model' => PrivateWorksViewModel::class,
    // querydata
    'querydata' => [
    ],
];
