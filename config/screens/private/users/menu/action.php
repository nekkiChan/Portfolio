<?php
use App\Models\screens\private\users\menu\UsersMenuModel;

return [
    // title
    'pagetitle' => [
    ],
    // path
    'routepath' => 'private.users.menu.index',
    'jspath' => 'private/users/menu/index/',
    'csspath' => 'private/users/menu/index/',
    'nextpath' => 'private.users.menu.index',
    'backpath' => 'public.mainmenu.index',
    // model
    'model' => UsersMenuModel::class,
    // table
    'table' => null,
    // querydata
    'querydata' => [
    ],
];
