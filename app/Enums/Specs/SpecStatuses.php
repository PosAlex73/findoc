<?php

namespace App\Enums\Specs;

use App\Enums\Enumable;

class SpecStatuses
{
    use Enumable;

    public const ACTIVE = 'A';
    public const VACATION = 'V';
    public const FIRED = 'F';
    public const BUSY = 'B';
}
