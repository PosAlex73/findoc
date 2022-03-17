<?php

namespace App\Composers\Admin;

use App\Enums\User\Gender;
use App\Enums\User\UserStatuses;
use App\Enums\User\UserTypes;
use Illuminate\View\View;

class UserComposer
{
    public function compose(View $view)
    {
        $view->with('user_statuses', UserStatuses::getAll());
        $view->with('genders', Gender::getAll());
        $view->with('user_types', UserTypes::getAll());
    }
}
