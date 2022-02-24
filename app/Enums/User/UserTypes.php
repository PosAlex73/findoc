<?php

namespace App\Enums\User;

use App\Enums\Enumable;

class UserTypes
{
    use Enumable;

    public const ADMIN = 'A';
    public const SIMPLE = 'S';
    public const MODERATOR = 'M';
    public const SPEC = 'D';
}
