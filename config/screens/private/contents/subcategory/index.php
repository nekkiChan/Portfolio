<?php
use App\Models\screens\private\contents\menu\PrivateContentsMenuModel;
use App\Models\dbtables\S003Owner;

return [
    // title
    'pagetitle' => [
        'main' => 'ContentsMenu',
        'view' => 'コンテンツ情報',
        'transition' => 'コンテンツ情報',
    ],
    // path
    'routepath' => 'private.contents.menu.index',
    'jspath' => 'private.contents.menu.javascript',
    'csspath' => 'private/contents/menu/index/',
    // model
    'model' => PrivateContentsMenuModel::class,
    // querydata
    'querydata' => [
        // contents_category
        'contents_categories_data' => [
            'basetable' => [
                'table' => 'm101_content_categories',
                'alias' => 'm101',
            ],
            'select' => [
                [
                    'table' => 'm101',
                    'column' => 'id',
                    'alias' => 'id',
                ],
            ],
        ],
    ],
    // transition_data
    'transition_data' => [
        // content_category
        'content_category' => [
            'view' => 'コンテンツカテゴリ',
            'data' => [
                'list' => [
                    'routepath' => 'private.contents.menu.index',
                    'configpath' => 'private.contents.menu.index',
                    'iconpath' => 'home.svg',
                    'level' => 999,
                ],
                'add' => [
                    'routepath' => 'private.contents.menu.index',
                    'configpath' => 'private.contents.menu.index',
                    'iconpath' => 'home.svg',
                    'level' => 999,
                ],
            ],
        ],
        // content_subcategory
        'content_subcategory' => [
            'view' => 'コンテンツサブカテゴリ',
            'data' => [
                'edit' => [
                    'routepath' => 'private.contents.menu.index',
                    'configpath' => 'private.contents.menu.index',
                    'iconpath' => 'home.svg',
                    'level' => 999,
                ],
                'add' => [
                    'routepath' => 'private.contents.menu.index',
                    'configpath' => 'private.contents.menu.index',
                    'iconpath' => 'home.svg',
                    'level' => 999,
                ],
            ],
        ],
    ],
];
