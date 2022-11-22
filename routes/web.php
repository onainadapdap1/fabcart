<?php

use App\Http\Controllers\Admin\RegisteredController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
    return view('frontend.index');
});



Auth::routes();

Route::group(['middleware' => ['auth', 'isUser']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/my-profile', [UserController::class, 'myprofile']);
    Route::post('/my-profile-update', [UserController::class, 'profileupdate']);
});

//if is admin and authenticate user, then return to dashboard
Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/registered-user', [RegisteredController::class, 'index']);
    Route::get('/role-edit/{id}', [RegisteredController::class, 'edit']);
    Route::put('/role-update/{id}', [RegisteredController::class, 'updaterole']);
});

// if is vendor and authenticate user, then return to vendor-dashboard
Route::group(['middleware' => ['auth', 'isVendor']], function () {
    Route::get('/vendor-dashboard', function () {
        return view('vendor.dashboard');
    });
});
