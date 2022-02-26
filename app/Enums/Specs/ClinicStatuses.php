<?php

namespace App\Enums\Specs;

use App\Enums\Enumable;

class ClinicStatuses
{
    use Enumable;

    public const ACTIVE = 'A';
    public const DISABLED = 'D';
}
