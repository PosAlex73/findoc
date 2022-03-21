<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Clinic;

class ClinicController extends Controller
{
    public function view(Clinic $clinic)
    {
        return view('front.views.clinics.details', [
            'clinic' => $clinic
        ]);
    }
}
