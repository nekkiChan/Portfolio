<?php
use App\Models\screens\private\career\view\PrivateCareerViewModel;

return [
    // title
    'pagetitle' => [
        'main' => 'Career',
        'view' => '経歴',
        'transition' => '経歴',
    ],
    // path
    'routepath' => 'private.career.view.index',
    'jspath' => 'private/career/view/index/',
    'csspath' => 'private/career/view/index/',
    'nextpath' => 'private.career.view.index',
    'backpath' => 'public.mainmenu.index',
    // model
    'model' => PrivateCareerViewModel::class,
    // querydata
    'querydata' => [
    ],
];
