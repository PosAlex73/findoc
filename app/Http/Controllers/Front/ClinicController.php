<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClinicRequest;
use App\Http\Requests\UpdateClinicRequest;
use App\Models\Clinic;

class ClinicController extends Controller
{
    public function list(Clinic $clinic)
    {
        return view('front.views.clinics.view', [
            'clinic' => $clinic
        ]);
    }
}
