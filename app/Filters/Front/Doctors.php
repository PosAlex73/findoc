<?php

namespace App\Filters\Front;

use App\Filters\Filter;
use Illuminate\Http\Request;
use Ramsey\Collection\Collection;

class Doctors extends Filter
{
    public const SEARCH = 'doctor';

    function getItemsForSearch(Request $request): iterable
    {
        if ($request->has('search') && $request->has('search')) {
            $items = $this->model::where('description', 'LIKE', "%{$request->get('search')}%")
                ->get();
        }

        return !empty($items) ? $items : new Collection();
    }
}
