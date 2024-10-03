<?php
use App\Models\screens\private\contents\category\list\PrivateContentsCategoryListModel;
use App\Models\dbtables\M101ContentCategory;

return [
    // title
    'pagetitle' => [
    ],
    // path
    'routepath' => 'private.contents.category.list.index',
    'jspath' => 'private/contents/category/list/index/',
    'csspath' => 'private/contents/category/list/index/',
    'nextpath' => 'private.contents.category.list.index',
    'backpath' => 'private.contents.menu.index',
    // model
    'model' => PrivateContentsCategoryListModel::class,
    // table
    'table' => M101ContentCategory::class,
    // querydata
    'querydata' => [
    ],
];
