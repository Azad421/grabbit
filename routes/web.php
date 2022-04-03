<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Controllers\Auth\Jobseeker\RegisterController as JobSeekersRegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MicroJobController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/verify/{verify_code}', 'App\Http\Controllers\Auth\RegisterController@verify')->name('user.verify');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/job', [HomeController::class, 'job'])->name('jobs');
Route::get('/job/{id}', [HomeController::class, 'singleJob'])->name('job');
Route::get('/job/category/{id}', [HomeController::class, 'job'])->name('job.category');
Route::post('/job/payment', [OrderController::class, 'payment'])->name('payment');
Route::post('/job/order', [OrderController::class, 'create'])->name('order');
Route::get('/order', [UserController::class, 'order'])->name('order.index');
Route::delete('/order/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
Route::get('/order/{id}', [UserController::class, 'orderDetails'])->name('order.show');
Route::get('/delivery/{id}', [UserController::class, 'deliver'])->name('delivery.index');
Route::get('/completed/{id}', [UserController::class, 'orderCompleted'])->name('delivery.completed');

Route::get('/user/profile/{id}', [HomeController::class, 'profile'])->name('user.profile');
Route::get('/inbox/{id?}', [UserController::class, 'inbox'])->name('inbox');
Route::post('/inbox/send', [MessageController::class, 'send'])->name('send');
Route::post('/inbox/face', [MessageController::class, 'faceMessage'])->name('face');
Route::get('/inbox/create/{order}', [UserController::class, 'insertChat'])->name('inbox.create');

Route::get('/user', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/user/deactivate', [UserController::class, 'deactivate'])->name('acc.deactivate');
Route::resource('/microjob', \App\Http\Controllers\User\MicroJobController::class);
Route::post('/profile/update', [UserController::class, 'profileUpdate'])->name('profile.update');

Route::post('register/jobseeker', [JobSeekersRegisterController::class, 'register'])->name('jobseeker.register');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::resource('/review', ReviewController::class);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class,'index'])->name('dashboard');
    Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class,'login']);
    Route::post('/logout', [LoginController::class,'logout'])->name('logout');
    Route::resource('/category', CategoryController::class);
    Route::resource('/microjob', MicroJobController::class);
    Route::get('/category/status/{id}', [CategoryController::class, 'updateStatus'])->name('category.status');
    Route::post('job/{id}/reject', [MicroJobController::class, 'reject'])->name('job.reject');
    Route::post('job/{id}/approve', [MicroJobController::class, 'approve'])->name('job.approve');
    Route::get('setting', [AdminController::class, 'setting'])->name('setting');
    Route::put('email', [AdminController::class, 'changeEmail'])->name('changeEmail');
    Route::put('password', [AdminController::class, 'changePassword'])->name('changePassword');
    Route::get('email/verify/{token}/{email}', [AdminController::class, 'emailVerify'])->name('email.verify');
    Route::get('users', [AdminController::class, 'users'])->name('users');
    Route::get('user/approve/{user}', [AdminController::class, 'userApprove'])->name('user.approve');
    Route::get('user/reject/{user}', [AdminController::class, 'userReject'])->name('user.reject');
});
//Route::prefix('employee')->name('employee.')->group( function () {
//    Route::get('/', [EmployeeController::class,'index'])->name('dashboard');
//    Route::resource('/microjob', \App\Http\Controllers\JobSeeker\MicroJobController::class);
//    Route::get('/profile', [EmployeeController::class, 'profile'])->name('profile');
//
//});

//Route::prefix('jobseeker')->name('jobSeeker.')->group( function () {
//    Route::get('/', [JobSeekerController::class,'index'])->name('dashboard');
//
//    Route::get('/profile', [EmployeeController::class, 'profile'])->name('profile');
//    Route::post('/profile/{id}', [EmployeeController::class, 'profileUpdate'])->name('profile.update');
//});
