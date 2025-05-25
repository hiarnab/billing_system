<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExcutiveController extends Controller
{
    public function index()
    {
        return view('excutive.dashboard');
    }
}
