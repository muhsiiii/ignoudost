<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminHome()
    {
        return view('admin.admin_home');
    }

    public function Form()
    {
        return view('admin.form');
    }

    public function Table()
    {
        return view('admin.table');
    }

    public function Login()
    {
        return view('admin.login');
    }

    public function DOLogin()
    {
        // return "hello";
        $input = ['username' => request('name'), 'password' => request('password')];
        if (auth()->attempt($input, true)) {
            return redirect()->route('home')->with('message', 'Login Success');
        } else {
            return redirect()->route('login')->with('message', 'username or password invalid');
        }
    }

    public function LogOut()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
