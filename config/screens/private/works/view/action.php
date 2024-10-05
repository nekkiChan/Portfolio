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
    'routepath' => 'private.works.view.index',
    'jspath' => 'private/works/view/index/',
    'csspath' => 'private/works/view/index/',
    'nextpath' => 'private.works.view.index',
    'backpath' => 'public.mainmenu.index',
    // model
    'model' => PrivateWorksViewModel::class,
    // querydata
    'querydata' => [
    ],
];
