<?php

namespace App\Http\Controllers\Admin;
use App\Enums\Settings\SettingTypes;
use App\Facades\Set;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUserHistoryRequest;
use App\Http\Requests\Users\UpdateUserHistoryRequest;
use App\Models\Category;
use App\Models\UserHistory;
use Illuminate\Http\Request;

class UserHistoryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_histories = UserHistory::with('user')->paginate(Set::get(SettingTypes::ADMIN_PAGINATION));

        return view('admin.views.user_histories.list', ['user_histories' => $user_histories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.views.user_histories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Users\StoreUserHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserHistoryRequest $request)
    {
        $fields = $request->safe()->only(['title', 'description', 'user_id']);
        $user_history = UserHistory::create($fields);

        $request->session()->flash('status', __('vars.history_was_created'));

        return redirect()->to(route('histories.edit', ['history' => $user_history]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserHistory  $userHistory
     * @return \Illuminate\Http\Response
     */
    public function show(UserHistory $userHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserHistory  $userHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(UserHistory $history)
    {
        return view('admin.views.user_histories.edit', ['history' => $history]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Users\UpdateUserHistoryRequest  $request
     * @param  \App\Models\UserHistory  $userHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserHistoryRequest $request, UserHistory $history)
    {
        $fields = $request->safe()->only(['title', 'description']);
        $history->update($fields);

        $request->session()->flash('status', __('vars.history_was_updated'));

        return redirect()->to(route('histories.edit', ['history' => $history]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserHistory  $userHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserHistory $history)
    {
        UserHistory::destroy($history->id);

        request()->session()->flash('status', __('vars.history_was_deleted'));

        return redirect()->to(route('histories.index'));
    }

    public function massDelete(Request $request)
    {
        $ids = $request->get('histories');
        UserHistory::destroy($ids);

        $request->session()->flash('status', __('vars.histories_were_deleted'));

        return redirect()->to(route('histories.index'));
    }
}
