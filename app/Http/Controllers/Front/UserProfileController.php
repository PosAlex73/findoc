<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function profile()
    {
        return view('front.views.profile.index');
    }

    public function update(ProfileUpdateRequest $request)
    {
        $fields = $request->safe()->only(['first_name', 'last_name', 'age', 'gender', 'email']);
        Auth::user()->update($fields);

        $request->session()->flash('status', __('vars.profile_was_updated'));

        return redirect()->to(route('front.profile'));
    }

    public function notifications()
    {
        $notifications = Auth::user()->notifications;

        return view('front.views.profile.index', [
            'notifications' => $notifications
        ]);
    }

    public function deleteNotification(Request $request, string $notification)
    {
        Auth::user()->notifications()->where('id', $notification)->delete();
        $request->session()->flash('status', __('vars.notifications_was_deleted'));

        return redirect()->to('front.profile');
    }
}
