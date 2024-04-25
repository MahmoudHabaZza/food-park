<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\EndUser\DashboardController as EndUserDashboardController;
use App\Http\Controllers\EndUser\HomeController;
use App\Http\Controllers\EndUser\ProfileController as EndUserProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');



Route::group(['middleware' => 'auth'],function () {
    Route::get('/dashboard',[EndUserDashboardController::class,'index'])->name('dashboard');

    // Profile Routes
    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'controller' => EndUserProfileController::class]
    ,function () {
        // update personal info
        Route::put('update_info','updateProfile')->name('update');
        Route::put('update_password','updatePassword')->name('update.password');

    });
});







require __DIR__.'/auth.php';

