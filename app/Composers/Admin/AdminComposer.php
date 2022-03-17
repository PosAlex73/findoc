<?php

namespace App\Composers\Admin;

use App\Enums\User\UserStatuses;
use App\Enums\User\UserTypes;
use Illuminate\View\View;

class AdminComposer
{
    public function compose(View $view)
    {
        $view->with('statuses', UserStatuses::getAll());
        $view->with('types', UserTypes::getAll());
    }
}
