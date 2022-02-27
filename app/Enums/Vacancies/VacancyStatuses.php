<?php

namespace App\Enums\Vacancies;

use App\Enums\Enumable;

class VacancyStatuses
{
    use Enumable;

    public const ACTIVE = 'A';
    public const DISABLED = 'D';
}
