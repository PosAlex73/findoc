<?php

namespace App\Http\Controllers\Front;

use App\Events\Users\UserRecordedCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Support\Facades\Event;

class AppointmentController extends Controller
{
    public function record()
    {
        return view('front.views.records.view');
    }

    public function createRecord(StoreAppointmentRequest $request)
    {
        $fields = $request->safe()->only(['spec_id', 'type', 'datetime', 'text']);
        $record = Appointment::create($fields);

        Event::dispatch(new UserRecordedCreated($record));

        $request->session()->flash('status', __('vars.record_was_create'));

        return redirect()->to('front.record');
    }
}
