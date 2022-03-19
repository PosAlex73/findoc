<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Settings\UpdateSettingRequest;
use App\Models\Setting;
use App\Settings\Settings;

class SettingController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.views.settings.list');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Settings\UpdateSettingRequest  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $field_types = Settings::getFlatSettings();
        $settings = $request->only($field_types);

        foreach ($settings as $title => $value) {
            Setting::where('title', $title)->update(['value' => $value ?? '']);
        }

        $request->session()->flash('status', __('vars.settings_was_updated'));

        return redirect()->to(route('settings.index'));
    }
}
