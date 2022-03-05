<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
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
