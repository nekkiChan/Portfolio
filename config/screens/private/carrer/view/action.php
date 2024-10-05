<?php
use App\Models\screens\private\carrer\view\PrivateCarrerViewModel;

return [
    // title
    'pagetitle' => [
        'main' => 'Carrer',
        'view' => '経歴',
        'transition' => '経歴',
    ],
    // path
    'routepath' => 'private.profile.view.index',
    'jspath' => 'private/profile/view/index/',
    'csspath' => 'private/profile/view/index/',
    'nextpath' => 'private.profile.view.index',
    'backpath' => 'public.mainmenu.index',
    // model
    'model' => PrivateCarrerViewModel::class,
    // querydata
    'querydata' => [
    ],
];
