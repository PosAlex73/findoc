<?php

namespace App\Filters\Front;

use App\Filters\Filter;
use Illuminate\Http\Request;
use Ramsey\Collection\Collection;

class Clinics extends Filter
{
    public const SEARCH = 'clinic';

    function getItemsForSearch(Request $request): iterable
    {
        if ($request->has('search') && $request->has('search')) {
            $items = $this->model::where('title', 'LIKE', "%{$request->get('search')}%")
                ->orWhere('description', 'LIKE', "%{$request->get('search')}%")
                ->get();
        }

        return !empty($items) ? $items : new Collection();
    }
}
