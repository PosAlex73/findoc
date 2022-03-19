<?php

namespace App\Composers\Admin;

use App\Enums\Specs\SpecStatuses;
use Illuminate\View\View;

class SpecStatusesComposer
{
    public function compose(View $view)
    {
        $view->with('spec_statuses', SpecStatuses::getAll());
    }
}
