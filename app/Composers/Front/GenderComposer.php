<?php

namespace App\Composers\Front;

use App\Enums\User\Gender;
use Illuminate\View\View;

class GenderComposer
{
    public function compose(View $view)
    {
        $view->with('genders', Gender::getAll());
    }
}
