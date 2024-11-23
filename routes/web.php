<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login.login');
});

Route::middleware(['isadmin'])->group(function(){
// dashboard route
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
// dashboard route

// course route
Route::get('/course/index',[CourseController::class,'index'])->name('course.index');
Route::get('/course/add',[CourseController::class,'create'])->name('course.add');
Route::post('/course/store',[CourseController::class, 'store'])->name('course.store');
Route::get('/course/edit/{id}',[CourseController::class, 'edit'])->name('course.edit');
Route::post('/course/update/{id}',[CourseController::class, 'update'])->name('course.update');
Route::get('/course/view/{id}',[CourseController::class, 'view'])->name('course.view');
Route::get('/course/active/{id}',[CourseController::class, 'active'])->name('active.course');
Route::get('/course/deactive/{id}',[CourseController::class, 'deactive'])->name('deactive.course');
// course route

// package route
Route::get('package/index',[PackageController::class,'index'])->name('package.index');
Route::get('/package/create',[PackageController::class,'create'])->name('package.create');
Route::post('/package/store',[PackageController::class, 'store'])->name('package.store');
Route::get('/package/edit/{id}',[PackageController::class, 'edit'])->name('package.edit');
Route::post('/package/update/{id}',[PackageController::class, 'update'])->name('package.update');
Route::get('/package/delete/{id}',[PackageController::class, 'destroy'])->name('package.delete');
// package route

});

// login route
Route::get('/login-view',[LoginController::class,'login_view'])->name('login.view');
Route::post('/loggin',[LoginController::class,'loggedin'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
// login route
