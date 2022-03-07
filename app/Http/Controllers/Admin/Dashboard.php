<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends AdminController
{
    public function dashboard()
    {
        return view('admin.views.dashboard');
    }
}
