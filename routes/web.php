<?php
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BillableItemController;
use App\Http\Controllers\ExcutiveController;
use App\Http\Controllers\PackageInstallmentController;
use App\Http\Controllers\StudentController;
use App\Models\PackageInstallment;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login.login');
});

Route::middleware(['isadmin'])->group(function(){
// dashboard route
Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

// course route
Route::get('course/index',[CourseController::class,'index'])->name('course.index');

Route::get('course/add',[CourseController::class,'create'])->name('course.add');
Route::post('course/store',[CourseController::class, 'store'])->name('course.store');

Route::get('course/edit/{id}',[CourseController::class, 'edit'])->name('course.edit');
Route::post('course/update/{id}',[CourseController::class, 'update'])->name('course.update');

Route::get('course/active/{id}',[CourseController::class, 'active'])->name('active.course');
Route::get('course/deactive/{id}',[CourseController::class, 'deactive'])->name('deactive.course');
// course route




// user route
Route::get('user/add',[UserController::class, 'create'])->name('user.add');
Route::post('user/store',[UserController::class, 'store'])->name('user.store');
Route::get('user/index',[UserController::class, 'index'])->name('user.index');
// user route




// billable_item
Route::get('billable-item/index',[BillableItemController::class,'index'])->name('billable-item.index');

Route::get('billable-item/create',[BillableItemController::class,'create'])->name('billable-item.create');
Route::post('billable-item/store',[BillableItemController::class,'store'])->name('billable-item.store');
Route::get('billable-item/edit/{id}',[BillableItemController::class, 'edit'])->name('billable-item.edit');
Route::post('billable-item/update/{id}',[BillableItemController::class, 'update'])->name('billable-item.update');
Route::get('billable-item/delete/{id}',[BillableItemController::class, 'destroy'])->name('billable-item.delete');

Route::get('billable-item/active/{id}',[BillableItemController::class, 'active'])->name('billable-item.active');
Route::get('billable-item/deactive/{id}',[BillableItemController::class, 'deactive'])->name('billable-item.deactive');
// billable_item


// package route
Route::get('package/index',[PackageController::class,'index'])->name('package.index');
Route::get('/package/create',[PackageController::class,'create'])->name('package.create');
Route::post('/package/store',[PackageController::class, 'store'])->name('package.store');
Route::get('/package/view/{id}',[PackageController::class, 'view'])->name('package.view');
Route::get('/package/edit/{id}',[PackageController::class, 'edit'])->name('package.edit');
Route::post('/package/update/{id}',[PackageController::class, 'update'])->name('package.update');
Route::get('/package/delete/{id}',[PackageController::class, 'destroy'])->name('package.delete');

// package_installment
Route::get('package-installment/index',[PackageInstallmentController::class, 'index'])->name('installment.index');
Route::get('package-installment/create',[PackageInstallmentController::class, 'create'])->name('installment.create');
Route::post('package-installment/store',[PackageInstallmentController::class, 'store'])->name('installment.store');
Route::get('package-installment/view/{package_id}',[PackageInstallmentController::class, 'view'])->name('installment.view');
Route::get('package-installment/edit/{id}',[PackageInstallmentController::class, 'edit'])->name('installment.edit');
Route::post('package-installment/update/{id}',[PackageInstallmentController::class, 'update'])->name('installment.update');
Route::get('package-installment/delete/{id}',[PackageInstallmentController::class, 'destroy'])->name('installment.delete');
// package_installment

// admission route
Route::get('admission/list',[AdmissionController::class, 'index'])->name('admission.list');
Route::get('admission/create',[AdmissionController::class, 'create'])->name('admission.create');
Route::post('admission/store',[AdmissionController::class, 'store'])->name('admission.store');
Route::get('/get-package-by-course/{course_id}', [AdmissionController::class, 'getpackageBycourse']);
Route::get('/get-package-details/{package_id}',[AdmissionController::class, 'getPackageDetails']);
Route::get('admission/view/{id}',[AdmissionController::class, 'view'])->name('admission.view');
// admission route

// payment route
Route::get('payment/index/{id}',[PaymentController::class,'payment'])->name('payment.list');
Route::get('payment/full/{id}',[PaymentController::class, 'FullPayment'])->name('payment.full');
Route::post('payment/submit',[PaymentController::class,'Full_payment_complete'])->name('payment.submit');
Route::get('payment/partial/{id}',[PaymentController::class,'partial_payment'])->name('payment.partial');
Route::post('payment/partial/submit',[PaymentController::class,'partial_payment_complete'])->name('payment.partial.submit');
// payment route

});
// Student route
Route::middleware(['student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard']);

});
Route::get('/student/list',[StudentController::class, 'index'])->name('student.list');
Route::get('/student/create',[StudentController::class, 'create'])->name('student.create');
Route::post('/student/store',[StudentController::class, 'store'])->name('student.store');
Route::get('/student/edit/{id}',[StudentController::class, 'edit'])->name('student.edit');
Route::post('/student/update/{id}',[StudentController::class, 'update'])->name('student.update');
Route::get('/student/destroy',[StudentController::class, 'destroy'])->name('student.delete');

// student route


// excutive route
Route::middleware(['auth', 'executive'])->group(function () {
    Route::get('/executive/dashboard', [ExcutiveController::class, 'index'])->name('excutive.dashboard');
    // Add more executive routes here
});

// excutive route


// login route
Route::get('/login-view',[LoginController::class,'login_view'])->name('login.view');
Route::post('/loggin',[LoginController::class,'loggedin'])->name('login.submit');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
// login route

// Route::get('/send-test-sms', [ServiceController::class, 'sendTestSms']);

