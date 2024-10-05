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
    'routepath' => 'private.carrer.view.index',
    'jspath' => 'private/carrer/view/index/',
    'csspath' => 'private/carrer/view/index/',
    'nextpath' => 'private.carrer.view.index',
    'backpath' => 'public.mainmenu.index',
    // model
    'model' => PrivateCarrerViewModel::class,
    // querydata
    'querydata' => [
    ],
];
