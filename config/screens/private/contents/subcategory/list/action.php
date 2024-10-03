<?php
use App\Models\screens\private\contents\subcategory\list\PrivateContentsSubCategoryListModel;
use App\Models\dbtables\M102ContentSubCategory;

return [
    // title
    'pagetitle' => [
    ],
    // path
    'routepath' => 'private.contents.subcategory.list.index',
    'jspath' => 'private/contents/subcategory/list/index/',
    'csspath' => 'private/contents/subcategory/list/index/',
    'nextpath' => 'private.contents.subcategory.list.index',
    'backpath' => 'private.contents.menu.index',
    // model
    'model' => PrivateContentsSubCategoryListModel::class,
    // table
    'table' => M102ContentSubCategory::class,
    // querydata
    'querydata' => [
    ],
];
