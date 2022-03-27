<?php

namespace App\Filters;

use Illuminate\Http\Request;

abstract class Filter
{
    public const SEARCH = 'all';

    public function __construct(string $model)
    {
        $this->model = $model;
    }

    abstract function getItemsForSearch(Request $request): iterable;
}
