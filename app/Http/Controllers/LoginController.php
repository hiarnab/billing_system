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


        $admin = \App\Models\User::where('email', $request->email)->get();
        if( sizeof($admin) > 0)
        {
            // return "ok";
            if(Auth::attempt($credential)){
                return redirect()->route('dashboard');
            }
            return redirect()->back();
        }else{
            // $credentials = $request->only('email', 'password');
            // return "ok";
            if (Auth::guard('student_guard')->attempt($credential)) {
                return redirect()->intended('/student/dashboard');
            }
            return back()->withErrors(['email' => 'Invalid credentials']);
        }

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login.view');
    }
}
