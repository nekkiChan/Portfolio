<?php
return [
    // public
    'guest' => [
        'menu' => [
            'routepath' => 'public.mainmenu.index',
            'configpath' => 'public.mainmenu.index',
            'view' => config('screens.public.mainmenu.index.pagetitle.transition'),
            'level' => 1,
        ],
        'login' => [
            'routepath' => 'login',
            'configpath' => 'public.mainmenu.index',
            'view' => 'ログイン',
            'level' => 1,
        ],
    ],
    // auth
    'auth' => [
        'menu' => [
            'routepath' => 'public.mainmenu.index',
            'configpath' => 'public.mainmenu.index',
            'view' => config('screens.public.mainmenu.index.pagetitle.transition'),
            'level' => 1,
        ],
        'users_menu' => [
            'routepath' => 'private.users.menu.index',
            'configpath' => 'private.users.menu.index',
            'view' => config('screens.private.users.menu.index.pagetitle.transition'),
            'level' => 999,
        ],
        'profile_edit' => [
            'routepath' => 'private.profile.edit.index',
            'configpath' => 'private.profile.edit.index',
            'view' => config('screens.private.profile.edit.index.pagetitle.transition'),
            'level' => 1,
        ],
        'contents' => [
            'routepath' => 'private.contents.menu.index',
            'configpath' => 'private.contents.menu.index',
            'view' => config('screens.private.contents.menu.index.pagetitle.transition'),
            'level' => 999,
        ],
        'owner_edit' => [
            'routepath' => 'private.owner.edit.index',
            'configpath' => 'private.owner.edit.index',
            'view' => config('screens.private.owner.edit.index.pagetitle.transition'),
            'level' => 999,
        ],
        'logout' => [
            'routepath' => 'logout',
            'configpath' => 'public.mainmenu.index',
            'view' => 'ログアウト',
            'level' => 1,
        ],
    ],
];
