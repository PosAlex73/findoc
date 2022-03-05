<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function view(Blog $blog)
    {
        return view('front.views.blog.view', [
            'article' => $blog
        ]);
    }
}
