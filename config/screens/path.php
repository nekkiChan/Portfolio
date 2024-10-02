<?php
return [
    // public
    '/' => 'public.mainmenu.index',
    '/login' => 'public.login.index',

    // private
    // profile
    '/private/profile/edit' => 'private.profile.edit.index',
    '/private/profile/edit/action' => 'private.profile.edit.action',
    // contents
    '/private/contents/menu' => 'private.contents.menu.index',
    '/private/contents/menu/action' => 'private.contents.menu.action',
    // content_category
    '/private/contents/category/list' => 'private.contents.category.list.index',
    '/private/contents/category/list/action' => 'private.contents.category.list.action',
    '/private/contents/category/edit' => 'private.contents.category.edit.index',
    '/private/contents/category/edit/action' => 'private.contents.category.edit.action',
    // owner
    '/private/owner/edit' => 'private.owner.edit.index',
    '/private/owner/edit/action' => 'private.owner.edit.action',
];
