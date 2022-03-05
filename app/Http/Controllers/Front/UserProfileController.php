<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function profile()
    {
        return view('front.views.profile.index');
    }

    public function notifications()
    {
        return view('front.views.profile.notifications');
    }

    public function deleteNotification(Request $request, string $notification)
    {
        Auth::user()->notifications()->where('id', $notification)->delete();
        $request->session()->flash('status', __('vars.notifications_was_deleted'));

        return redirect()->to('front.profile');
    }
}
