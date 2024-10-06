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
    // rolelevel
    'rolelevel' => 999,
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
        // content_category_body
        'content_category_body' => [
            'view' => 'コンテンツ内容',
            'data' => [
                'list' => [
                    'routepath' => 'private.contents.body.list.index',
                    'configpath' => 'private.contents.body.list.index',
                    'iconpath' => 'home.svg',
                    'level' => 999,
                ],
                'edit' => [
                    'routepath' => 'private.contents.body.edit.index',
                    'configpath' => 'private.contents.body.edit.index',
                    'iconpath' => 'home.svg',
                    'level' => 999,
                ],
            ],
        ],
        // content_category
        'content_category' => [
            'view' => 'コンテンツカテゴリ',
            'data' => [
                'list' => [
                    'routepath' => 'private.contents.category.list.index',
                    'configpath' => 'private.contents.category.list.index',
                    'iconpath' => 'home.svg',
                    'level' => 999,
                ],
                'edit' => [
                    'routepath' => 'private.contents.category.edit.index',
                    'configpath' => 'private.contents.category.edit.index',
                    'iconpath' => 'home.svg',
                    'level' => 999,
                ],
            ],
        ],
        // content_subcategory
        'content_subcategory' => [
            'view' => 'コンテンツサブカテゴリ',
            'data' => [
                'list' => [
                    'routepath' => 'private.contents.subcategory.list.index',
                    'configpath' => 'private.contents.subcategory.list.index',
                    'iconpath' => 'home.svg',
                    'level' => 999,
                ],
                'edit' => [
                    'routepath' => 'private.contents.subcategory.edit.index',
                    'configpath' => 'private.contents.subcategory.edit.index',
                    'iconpath' => 'home.svg',
                    'level' => 999,
                ],
            ],
        ],
    ],
];
