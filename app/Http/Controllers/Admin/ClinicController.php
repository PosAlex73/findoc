<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Settings\SettingTypes;
use App\Facades\Set;
use App\Http\Controllers\Controller;
use App\Http\Requests\Services\StoreClinicRequest;
use App\Http\Requests\Services\UpdateClinicRequest;
use App\Models\Clinic;

class ClinicController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinics = Clinic::paginate(Set::get(SettingTypes::ADMIN_PAGINATION));

        return view('admin.views.clinics.list', ['clinics' => $clinics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.views.clinics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Services\StoreClinicRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClinicRequest $request)
    {
        $fields = $request->safe()->only(['title', 'description', 'status', 'found', 'phone', 'address']);
        $clinic = Clinic::create($fields);

        $request->session()->flash('status', __('vars.clinic_was_created'));

        return redirect()->to(route('clinics.edit', ['clinic' => $clinic]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function show(Clinic $clinic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinic $clinic)
    {
        return view('admin.views.clinics.edit', ['clinic' => $clinic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Services\UpdateClinicRequest  $request
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClinicRequest $request, Clinic $clinic)
    {
        $fields = $request->safe()->only(['title', 'description', 'status', 'found', 'phone', 'address']);
        $clinic->update($fields);

        $request->session()->flash('status', __('vars.clinic_was_created'));

        return redirect()->to(route('clinics.edit', ['clinic' => $clinic]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic $clinic)
    {
        Clinic::destroy($clinic->id);

        request()->session()->flash('status', __('vars.clinic_was_deleted'));

        return redirect()->to(route('clinics.index'));
    }
}
