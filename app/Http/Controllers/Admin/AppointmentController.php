<?php

namespace App\Http\Controllers\Admin;
use App\Enums\Settings\SettingTypes;
use App\Facades\Set;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreAppointmentRequest;
use App\Http\Requests\Users\StoreRecordsRequest;
use App\Http\Requests\Users\UpdateAppointmentRequest;
use App\Http\Requests\Users\UpdateRecordsRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Appointment::with(['user', 'spec'])->paginate(Set::get(SettingTypes::ADMIN_PAGINATION));

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
    public function store(StoreRecordsRequest $request)
    {
        $fields = $request->safe()->only(['user_id', 'spec_id', 'type', 'datetime', 'text']);
        $record = Appointment::create($fields);

        $request->session()->flash('status', __('vars.record_was_created'));

        return redirect()->to(route('records.edit', ['record' => $record]));
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
    public function update(UpdateRecordsRequest $request, Appointment $record)
    {
        $fields = $request->safe()->only(['user_id', 'spec_id', 'type', 'datetime', 'text']);
        $fields['datetime'] = (new \DateTime($fields['datetime']))->format('Y-m-d G:i:s');
        $record->update($fields);

        $request->session()->flash('status', __('vars.category_was_updated'));

        return redirect()->to(route('records.edit', ['record' => $record]));
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

        return redirect()->to(route('records.index'));
    }

    public function massDelete(Request $request)
    {
        $ids = $request->get('records');
        Appointment::destroy($ids);
        $request->session()->flash('status', __('vars.records_were_deleted'));

        return redirect()->to(route('records.index'));
    }
}
