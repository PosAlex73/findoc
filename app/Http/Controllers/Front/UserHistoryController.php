<?php

namespace App\Http\Controllers\Front;

use App\Enums\Settings\SettingTypes;
use App\Facades\Set;
use App\Http\Controllers\Controller;
use App\Models\UserHistory;
use Illuminate\Support\Facades\Auth;

class UserHistoryController extends Controller
{
    public function history()
    {
        $history = UserHistory::where('id', Auth::user()->id)->paginate(Set::get(SettingTypes::FRONT_PAGINATION));

        return view('front.views.profile.history', [
            'history' => $history
        ]);
    }
}
