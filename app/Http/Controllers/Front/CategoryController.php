<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function view(Category $category)
    {
        $services = $category->services;

        return view('front.views.services.services', ['services' => $services]);
    }
}
