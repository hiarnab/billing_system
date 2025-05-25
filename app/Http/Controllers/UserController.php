<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('user.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $entity = new User();
        $entity->name = $request->name;
        $entity->email = $request->email;
        // $entity->phone = $request->phone;
        $entity->password = Hash::make($request->password);
        $entity->role_id = $request->role_id;
        $entity->save();
        return redirect()->back();
        flash('User added successfully');
    }
}
