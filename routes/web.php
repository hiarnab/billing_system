<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['isadmin'])->group(function(){
// dashboard route
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
// dashboard route

// course route
Route::get('/course/index',[CourseController::class,'index'])->name('course.index');
// course route
});


// login route
Route::get('/login-view',[LoginController::class,'login_view'])->name('login.view');
Route::post('/loggin',[LoginController::class,'loggedin'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
// login route