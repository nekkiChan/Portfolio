<?php
use App\Models\screens\private\contents\body\edit\PrivateContentBodiesEditModel;
use App\Models\dbtables\D201ServiceLink;

return [
    // title
    'pagetitle' => [
    ],
    // path
    'routepath' => 'private.contents.link.edit.index',
    'jspath' => 'private/contents/link/edit/index/',
    'csspath' => 'private/contents/link/edit/index/',
    'nextpath' => 'private.contents.link.list.index',
    'backpath' => 'private.contents.link.list.index',
    // model
    'model' => PrivateContentBodiesEditModel::class,
    // table
    'table' => D201ServiceLink::class,
    // querydata
    'querydata' => [
    ],
    // insert
    'insert' => [
        'column' => [
        ],
    ],
    // update
    'update' => [
        'column' => [
            'link_path',
            'file_path',
            'service_category_id',
            'content_body_id',
            'sort',
            'is_admin',
        ],
    ],
    'nullable' => [
        'column' => [
        ],
    ],
    // upsert
    'upsert' => [
        'dbdata' => [
            D201ServiceLink::class => [
                'link_path',
                'file_path',
                'service_category_id',
                'content_body_id',
                'sort',
                'is_admin',
            ],
        ],
    ],
    // validate
    'validate' => [
        'conditions' => [
        ],
        'messages' => [
        ],
    ],
    // file
    'file' => [
        'dirname' => 'contents',
        'delete' => [
            'file_path' => [
                'table' => D201ServiceLink::class,
                'column' => 'file_path',
                'flag' => 'file_path',
            ],
        ],
    ],
];
