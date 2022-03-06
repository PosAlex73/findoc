<?php

namespace App\Http\Controllers\Admin;
use App\Enums\Settings\SettingTypes;
use App\Facades\Set;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreAppointmentRequest;
use App\Http\Requests\Users\UpdateAppointmentRequest;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Appointment::paginate(Set::get(SettingTypes::ADMIN_PAGINATION));

        return view('admin.views.records.list', ['records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.views.records.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Users\StoreAppointmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentRequest $request)
    {
        $fields = $request->safe()->only(['spec_id', 'type', 'datetime', 'text']);
        $record = Appointment::create($fields);

        $request->session()->flash('status', __('vars.record_was_created'));

        return redirect()->to('appointments.edit', ['record' => $record]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $record)
    {
        return view('admin.views.records.edit', ['record' => $record]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Users\UpdateAppointmentRequest  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $fields = $request->safe()->only(['spec_id', 'type', 'datetime', 'text']);
        $appointment->update($fields);

        $request->session()->flash('status', __('vars.category_was_updated'));

        return redirect()->to('records.edit', ['record' => $appointment]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $record)
    {
        Appointment::destroy($record->id);

        request()->session()->flash('status', __('vars.record_was_deleted'));

        return redirect()->to('records.index');
    }
}
