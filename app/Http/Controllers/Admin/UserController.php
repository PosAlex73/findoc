<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Settings\SettingTypes;
use App\Facades\Set;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(Set::get(SettingTypes::ADMIN_PAGINATION));

        return view('admin.views.users.list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.views.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $fields = $request->safe()->only([
            'first_name',
            'last_name',
            'age',
            'type',
            'status',
            'gender',
            'email',
        ]);

        //FIXME
        //get password check
        $fields['password'] = Hash::make($request->get('password'));
        $user = User::create($fields);
        $request->session()->flash('status', __('vars.user_was_created'));

        return redirect()->to(route('users.edit', ['user' => $user]));
    }

    public function edit(User $user)
    {
        return view('admin.views.users.edit', ['user' => $user]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $fields = $request->safe()->only([
            'first_name',
            'last_name',
            'age',
            'type',
            'status',
            'gender',
            'email',
        ]);

        $user->update($fields);
        $request->session()->flash('status', __('vars.user_was_updated'));

        return redirect()->to(route('users.edit', ['user' => $user]));
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);

        request()->session()->flash('status', __('vars.user_was_deleted'));

        return redirect()->to(route('users.index'));
    }

    public function massDelete(Request $request)
    {
        $ids = $request->get('users');
        User::destroy($ids);

        $request->session()->flash('status', __('vars.users_were_deleted'));

        return redirect()->to(route('users.index'));
    }
}
