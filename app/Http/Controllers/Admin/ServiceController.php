<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Settings\SettingTypes;
use App\Facades\Set;
use App\Http\Controllers\Controller;
use App\Http\Requests\Services\StoreServiceRequest;
use App\Http\Requests\Services\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate(Set::get(SettingTypes::ADMIN_PAGINATION));

        return view('admin.views.services.list', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.views.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Users\StoreUserHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        $fields = $request->safe()->only(['title', 'description', 'status', 'price', 'category_id']);
        $service = Service::create($fields);

        $request->session()->flash('status', __('vars.service_was_created'));

        return redirect()->to(route('services.edit', ['service' => $service]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserHistory  $userHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.views.services.edit', ['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Users\UpdateUserHistoryRequest  $request
     * @param  \App\Models\UserHistory  $userHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $fields = $request->safe()->only(['title', 'description', 'status', 'price', 'category_id']);
        $service->update($fields);

        $request->session()->flash('status', __('vars.service_was_updated'));

        return redirect()->to(route('services.edit', ['service' => $service]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserHistory  $userHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        Service::destroy($service->id);

        request()->session()->flash('status', __('vars.service_was_deleted'));

        return redirect()->to(route('services.index'));
    }

    public function massDelete(Request $request)
    {
        $ids = $request->get('services');
        Service::destroy($ids);
        $request->session()->flash('status', __('vars.services_were_deleted'));

        return redirect()->to(route('services.index'));
    }
}
