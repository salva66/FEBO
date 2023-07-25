<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        // dd(Hash::make(123456));
        if(!empty(Auth::check()))
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard');
            }
            else if (Auth::user()->user_type == 2)
            {
                return redirect('management/dashboard');
            }
            else if (Auth::user()->user_type == 3)
            {
                return redirect('sales/dashboard');
            }
            else if (Auth::user()->user_type == 4)
            {
                return redirect('hr/dashboard');
            }
            else if (Auth::user()->user_type == 11)
            {
                return redirect('site&project/dashboard');
            }
            else if (Auth::user()->user_type == 12)
            {
                return redirect('management/dashboard');
            }
        }
        return view('auth.login');
    }
    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard');
            }
            else if (Auth::user()->user_type == 2)
            {
                return redirect('management/dashboard');
            }
            else if (Auth::user()->user_type == 3)
            {
                return redirect('sales/dashboard');
            }
            else if (Auth::user()->user_type == 4)
            {
                return redirect('hr/dashboard');
            }
            else if (Auth::user()->user_type == 11)
            {
                return redirect('site&project/dashboard');
            }
            else if (Auth::user()->user_type == 12)
            {
                return redirect('management/dashboard');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Please enter correct email and password');
        }
        dd($request->all());
    }
    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }

}
