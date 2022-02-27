<?php

namespace App\Enums\Specs;

use App\Enums\Enumable;

class RecordStatus
{
    use Enumable;

    public const APPOINTED = 'A';
    public const DECLINED = 'D';
    public const COMPLETED = 'C';
    public const RESCHEDULED = 'R';
}
