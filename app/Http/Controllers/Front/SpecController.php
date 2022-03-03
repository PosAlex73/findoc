<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpecRequest;
use App\Http\Requests\UpdateSpecRequest;
use App\Models\Spec;
use Illuminate\Http\Request;

class SpecController extends Controller
{
    public function view(Request $request, Spec $spec)
    {
        return view('front.views.doctors.view', [
            'doctor' => $spec
        ]);
    }
}
