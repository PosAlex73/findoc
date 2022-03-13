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
            new Title('dashboard', 'box'),
            new Link(__('vars.dashboard'), 'dashboard', 'box'),
            new Title(__('users')),
            new Group(__('users'), new Collection(['users.index', 'histories.index', 'documents.index', 'records.index']), 'user'),
            new Title('services_title', 'box'),
            new Group(__('doctors_clinics'), new Collection(['specs.index', 'clinics.index', 'services.index', 'spec_reviews.index']), 'activity'),
            new Title('other', 'box'),
            new Link(__('vars.blogs'), 'blogs.index'),
            new Link(__('vars.categories'), 'categories.index', 'box'),
            new Link(__('vars.promotions'), 'promotions.index', 'box'),
            new Link(__('vars.vacancies'), 'vacancies.index', 'box'),
        ]);
    }
}
