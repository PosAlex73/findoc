<?php

namespace App\BreadCrumbs;

use Illuminate\Support\Facades\Route;

class BreadCrumbs
{
    public static function getBreadCrumbs()
    {
        $router = Route::getRoutes();
        dd($router);
    }

    private static function getBreadCrumbsSchema()
    {
        return [

        ];
    }
}
