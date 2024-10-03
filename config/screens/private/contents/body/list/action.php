<?php
use App\Models\screens\private\contents\body\list\PrivateContentBodiesListModel;
use App\Models\dbtables\M101ContentCategory;

return [
    // title
    'pagetitle' => [
    ],
    // path
    'routepath' => 'private.contents.body.list.index',
    'jspath' => 'private/contents/body/list/index/',
    'csspath' => 'private/contents/body/list/index/',
    'nextpath' => 'private.contents.body.list.index',
    'backpath' => 'private.contents.menu.index',
    // model
    'model' => PrivateContentBodiesListModel::class,
    // table
    'table' => M101ContentCategory::class,
    // querydata
    'querydata' => [
    ],
];
