<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function record()
    {
        return view('front.views.records.view');
    }

    public function createRecord(StoreAppointmentRequest $request)
    {
        $fields = $request->safe()->only(['spec_id', 'type', 'datetime', 'text']);
        Appointment::create($fields);

        $request->session()->flash('status', __('vars.record_was_create'));

        return redirect()->to('front.record');
    }
}
