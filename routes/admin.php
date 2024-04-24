<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
],function(){


    // Admin Login Routes
    Route::middleware('guest')->group(function () {
        Route::get('login',[AdminAuthController::class,'create'])->name('login');
        Route::post('login',[AdminAuthController::class,'store'])->name('login');
    });

    Route::middleware(['auth','role:admin'])->group(function(){
        Route::post('logout',[AdminAuthController::class,'destroy'])->name('logout');
        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

        // Profile Routes
        Route::get('profile',[ProfileController::class,'index'])->name('profile');
        Route::put('profile/update',[ProfileController::class,'updateProfile'])->name('profile.update');
        Route::put('profile/update_password',[ProfileController::class,'updatePassword'])->name('profile.update_password');


    });



});
