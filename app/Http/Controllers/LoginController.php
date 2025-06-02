<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Student;

class LoginController extends Controller
{
    public function login_view()
    {
        return view('login.login');
    }


    

public function loggedin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    // Attempt to authenticate from `users` table
    $user = User::where('email', $credentials['email'])->first();
    if ($user) {
        try {
            // Attempt normal Bcrypt check
            if (Hash::check($credentials['password'], $user->password)) {
                // Optionally rehash if needed
                if (Hash::needsRehash($user->password)) {
                    $user->password = Hash::make($credentials['password']);
                    $user->save();
                }

                Auth::login($user);

                // Redirect based on role
                if ($user->role_id === 1) {
                    return redirect()->route('dashboard'); // Admin
                } elseif ($user->role_id === 4) {
                    return redirect()->route('excutive.dashboard'); // Executive
                } else {
                    Auth::logout();
                    return back()->withErrors(['email' => 'Unauthorized user role.']);
                }
            }
        } catch (\RuntimeException $e) {
            // Likely non-Bcrypt hash, fallback to MD5
            if (md5($credentials['password']) === $user->password) {
                // Rehash to Bcrypt
                $user->password = Hash::make($credentials['password']);
                $user->save();

                Auth::login($user);

                if ($user->role_id === 1) {
                    return redirect()->route('dashboard');
                } elseif ($user->role_id === 4) {
                    return redirect()->route('excutive.dashboard');
                } else {
                    Auth::logout();
                    return back()->withErrors(['email' => 'Unauthorized user role.']);
                }
            }
        }
    }

    // Attempt to authenticate from `students` table using student_guard
    $student = Student::where('email', $credentials['email'])->first();
    if ($student) {
        try {
            if (Hash::check($credentials['password'], $student->password)) {
                if (Hash::needsRehash($student->password)) {
                    $student->password = Hash::make($credentials['password']);
                    $student->save();
                }

                Auth::guard('student_guard')->login($student);
                return redirect()->intended('/student/dashboard');
            }
        } catch (\RuntimeException $e) {
            if (md5($credentials['password']) === $student->password) {
                $student->password = Hash::make($credentials['password']);
                $student->save();

                Auth::guard('student_guard')->login($student);
                return redirect()->intended('/student/dashboard');
            }
        }
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
}



    // public function loggedin(Request $request)  
    // {
    //     $request->validate([
    //         'email'=>'required',
    //         'password'=> 'required',
    //     ]);

    //     $credential = $request->only('email', 'password');


    //     $admin = \App\Models\User::where('email', $request->email)->get();
    //     if( sizeof($admin) > 0)
    //     {
    //         // return "ok";
    //         if(Auth::attempt($credential)){
    //             return redirect()->route('dashboard');
    //         }
    //         return redirect()->back();
    //     }else{
    //         // $credentials = $request->only('email', 'password');
    //         // return "ok";
    //         if (Auth::guard('student_guard')->attempt($credential)) {
    //             return redirect()->intended('/student/dashboard');
    //         }
    //         return back()->withErrors(['email' => 'Invalid credentials']);
    //     }

    // }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login.view');
    }
}
