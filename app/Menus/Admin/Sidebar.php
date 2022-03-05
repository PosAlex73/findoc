<?php

namespace App\Menus\Admin;

use App\Menus\IMenu;

class Sidebar implements IMenu
{
    public static function getMenu(): iterable
    {
        return [
            'dashboard' => [
                'name' => 'dashboard',
            ],
            'users' => [
                'name' => 'users'
            ],
            'doctors' => [
                'name' => 'doctors'
            ],
            'clinics' => [
                'name' => 'clinics'
            ],
            'categories' => [
                'name' => 'categories'
            ],
            'services' => [
                'name' => 'services'
            ],
            'blog' => [
                'name' => 'blogs'
            ]
        ];
    }
}
