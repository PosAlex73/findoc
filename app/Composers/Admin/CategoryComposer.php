<?php

namespace App\Composers\Admin;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view)
    {
        $view->with('categories', Category::all(['id', 'title']));
    }
}
