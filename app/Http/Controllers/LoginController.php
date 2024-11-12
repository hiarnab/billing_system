<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login_view()
    {
        return view('login.login');
    }

    public function loggedin(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=> 'required',
        ]);

        $credential = $request->only('email', 'password');

        if(Auth::attempt($credential)){
            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login.view');
    }
}
