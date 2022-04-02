<?php

namespace App\Http\Controllers\Front;

use App\Enums\Specs\ClinicStatuses;
use App\Enums\Specs\SpecStatuses;
use App\Events\Users\UserRecordedCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\Clinic;
use App\Models\Spec;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class AppointmentController extends Controller
{
    public function record()
    {
        $doctors = Spec::where(['spec_status' => SpecStatuses::ACTIVE])->get();
        $clinics = Clinic::where(['status' => ClinicStatuses::ACTIVE])->get();

        return view('front.views.records.view',
            ['doctors' => $doctors, 'clinics' => $clinics]
        );
    }

    public function records()
    {
        $user = Auth::user();
        $records = $user->records();

        return view('front.views.profile.index', ['records' => $records]);
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
