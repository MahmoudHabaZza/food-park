<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\EndUser\CartController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('product/{slug}', [HomeController::class, 'showProduct'])->name('product.show');
Route::get('product/load-modal/{productId}', [HomeController::class, 'loadProductModal'])->name('product.load-modal');


// Cart Routes
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [EndUserDashboardController::class, 'index'])->name('dashboard');

    // Profile Routes
    Route::group(
        ['prefix' => 'profile', 'as' => 'profile.', 'controller' => EndUserProfileController::class],
        function () {
            // update personal info
            Route::put('profile', 'updateProfile')->name('update');
            Route::put('password', 'updatePassword')->name('update.password');
            Route::put('avatar', 'updateAvatar')->name('update.avatar');
        }
    );
});







require __DIR__ . '/auth.php';
