<?php
use App\Models\screens\private\contents\body\list\PrivateContentBodiesListModel;
use App\Models\dbtables\M101ContentCategory;

return [
    // title
    'pagetitle' => [
    ],
    // path
    'routepath' => 'private.users.list.index',
    'jspath' => 'private/users/list/index/',
    'csspath' => 'private/users/list/index/',
    'nextpath' => 'private.users.list.index',
    'backpath' => 'private/users/menu/index/',
    // model
    'model' => PrivateContentBodiesListModel::class,
    // table
    'table' => M101ContentCategory::class,
    // querydata
    'querydata' => [
    ],
];
