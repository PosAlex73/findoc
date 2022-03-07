<?php

namespace App\Menus\Admin;

use App\Menus\Admin\Components\Group;
use App\Menus\Admin\Components\Link;
use App\Menus\Admin\Components\Title;
use App\Menus\IMenu;
use Illuminate\Support\Collection;

class Sidebar implements IMenu
{
    public static function getMenu(): iterable
    {
        return new Collection( [
            new Title('dashboard'),
            new Link(__('vars.dashboard'), 'dashboard'),
            new Title(__('users')),
            new Group(__('users'), new Collection(['users', 'histories', 'threads', 'documents', 'records'])),
            new Title('services_title'),
            new Group(__('doctors_clinics'), new Collection(['doctors', 'clinics', 'services', 'spec_reviews'])),
            new Link(__('vars.blogs'), 'blogs.index'),
            new Link(__('vars.categories'), 'categories.index'),
            new Link(__('vars.promotions'), 'promotions.index'),
            new Link(__('vars.vacancies'), 'vacancies.index'),
        ]);
    }
}
