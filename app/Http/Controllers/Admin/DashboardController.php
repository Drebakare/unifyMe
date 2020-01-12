<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function Dashboard(){
        $requests = \App\Request::getAllRequest();
        return view('Dashboard.Admin.dashboard', compact('requests'));
    }
}
