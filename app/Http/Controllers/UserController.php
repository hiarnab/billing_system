<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('user.index',compact('user'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('user.create',compact('roles'));
    }

    public function store()
    {

    }
}
