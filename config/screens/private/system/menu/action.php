<?php
use App\Models\screens\private\contents\menu\PrivateContentsMenuModel;

return [
    // title
    'pagetitle' => [
    ],
    // path
    'routepath' => 'private.contents.menu.index',
    'jspath' => 'private/contents/menu/index/',
    'csspath' => 'private/contents/menu/index/',
    'nextpath' => 'private.contents.menu.index',
    'backpath' => 'public.mainmenu.index',
    // model
    'model' => PrivateContentsMenuModel::class,
    // table
    'table' => null,
    // querydata
    'querydata' => [
        
    ],
];
