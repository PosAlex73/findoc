<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Settings\SettingTypes;
use App\Facades\Set;
use App\Http\Controllers\Controller;
use App\Http\Requests\Services\StoreSpecRequest;
use App\Http\Requests\Services\UpdateSpecRequest;
use App\Models\Spec;
use Illuminate\Http\Request;

class SpecController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specs = Spec::paginate(Set::get(SettingTypes::ADMIN_PAGINATION));

        return view('admin.views.doctors.list', ['doctors' => $specs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.views.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSpecRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecRequest $request)
    {
        $fields = $request->safe()->only([
            'first_name',
            'last_name',
            'category_id',
            'description',
            'education',
            'experience',
            'phone',
            'address',
            'spec_status']
        );

        $doctor = Spec::create($fields);
        $request->session()->flash('status', __('vars.doctor_was_created'));

        return redirect()->to(route('specs.edit', ['spec' => $doctor]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spec  $spec
     * @return \Illuminate\Http\Response
     */
    public function show(Spec $spec)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spec  $spec
     * @return \Illuminate\Http\Response
     */
    public function edit(Spec $spec)
    {
        return view('admin.views.doctors.edit', ['doctor' => $spec]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpecRequest  $request
     * @param  \App\Models\Spec  $spec
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecRequest $request, Spec $spec)
    {
        $fields = $request->safe()->only([
                'first_name',
                'last_name',
                'category_id',
                'description',
                'education',
                'experience',
                'phone',
                'address',
                'spec_status']
        );
        $spec->update($fields);

        $request->session()->flash('status', __('vars.doctor_was_updated'));

        return redirect()->to(route('specs.edit', ['spec' => $spec]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spec  $spec
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spec $spec)
    {
        Spec::destroy($spec->id);

        request()->session()->flash('status', __('vars.doctor_was_deleted'));

        return redirect()->to(route('doctors.index'));
    }

    public function massDelete(Request $request)
    {
        $ids = $request->get('specs');
        Spec::destroy($ids);

        $request->session()->flash('status', __('vars.specs_were_deleted'));

        return redirect()->to(route('specs.index'));
    }
}
