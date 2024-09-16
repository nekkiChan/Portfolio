<?php
return [
    // public
    'guest' => [
        'menu' => [
            'routepath' => 'public.mainmenu.index',
            'configpath' => 'public.mainmenu.index',
            'view' => config('screens.public.mainmenu.index.pagetitle.transition'),
        ],
        'login' => [
            'routepath' => 'login',
            'configpath' => 'public.mainmenu.index',
            'view' => 'ログイン',
        ],
    ],
    // auth
    'auth' => [
        'menu' => [
            'routepath' => 'public.mainmenu.index',
            'configpath' => 'public.mainmenu.index',
            'view' => config('screens.public.mainmenu.index.pagetitle.transition'),
        ],
        'logout' => [
            'routepath' => 'logout',
            'configpath' => 'public.mainmenu.index',
            'view' => 'ログアウト',
        ],
    ],
];
