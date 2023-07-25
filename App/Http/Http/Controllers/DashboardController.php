<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        if(Auth::user()->user_type == 1)
        { 
            return view('admin.dashboard', $data);
        }
        else if (Auth::user()->user_type == 2)
        {
            return view('management.dashboard', $data);
        }
        else if (Auth::user()->user_type == 3)
        {
            return view('sales.dashboard', $data);
        }
        else if (Auth::user()->user_type == 4)
        {
            return view('hr.dashboard', $data);
        }
        else if (Auth::user()->user_type == 11)
        {
            return view('site&project.dashboard', $data);
        }
        else if (Auth::user()->user_type == 12)
        {
            return view('management.dashboard', $data);
        }
    }
}
