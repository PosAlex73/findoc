<?php

namespace App\Composers\Admin;

use App\Enums\Vacancies\VacancyStatuses;
use Illuminate\View\View;

class VacancyComposer
{
    public function compose(View $view)
    {
        $view->with('vacancy_statuses', VacancyStatuses::getAll());
    }
}
