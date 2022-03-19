<?php

namespace App\Composers\Admin;

use App\Enums\Specs\ClinicStatuses;
use Illuminate\View\View;

class ClinicComposer
{
    public function compose(View $view)
    {
        $view->with('clinic_statuses', ClinicStatuses::getAll());
    }
}
