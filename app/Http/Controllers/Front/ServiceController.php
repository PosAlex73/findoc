<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function details(Service $service)
    {
        return view('front.views.services.details', ['service' => $service]);
    }
}
