<?php

namespace App\Composers\Admin;

use App\Enums\User\UserStatuses;
use App\Enums\User\UserTypes;
use App\Models\User;
use Illuminate\View\View;

class SimpleUserComposer
{
    public function compose(View $view)
    {
        $view->with(
            'simple_users',
            User::where([
                'type' => UserTypes::SIMPLE,
                'status' => UserStatuses::ACTIVE
            ])->get()
        );
    }
}
