<?php
use App\Models\screens\private\contents\link\list\PrivateContentLinkListModel;
use App\Models\dbtables\M101ContentCategory;

return [
    // title
    'pagetitle' => [
    ],
    // path
    'routepath' => 'private.contents.link.list.index',
    'jspath' => 'private/contents/link/list/index/',
    'csspath' => 'private/contents/link/list/index/',
    'nextpath' => 'private.contents.link.list.index',
    'backpath' => 'private.contents.body.list.index',
    // model
    'model' => PrivateContentLinkListModel::class,
    // table
    'table' => M101ContentCategory::class,
    // querydata
    'querydata' => [
    ],
];
