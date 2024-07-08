<?php

use App\Events\RTOrderPlacedNotificationEvent;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\EndUser\AddressController;
use App\Http\Controllers\EndUser\CartController;
use App\Http\Controllers\EndUser\ChatController;
use App\Http\Controllers\EndUser\CheckoutController;
use App\Http\Controllers\EndUser\DashboardController as EndUserDashboardController;
use App\Http\Controllers\EndUser\HomeController;
use App\Http\Controllers\EndUser\PaymentController;
use App\Http\Controllers\EndUser\ProfileController as EndUserProfileController;
use App\Http\Controllers\ProfileController;
use App\Models\Order;
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
// Chef Page Routes
Route::get('/chefs',[HomeController::class,'chef'])->name('chef.index');


// Cart Routes
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('get-cart-products', [CartController::class, 'getCartProducts'])->name('get-cart-products');
Route::get('remove-cart-item/{rowId}', [CartController::class, 'removeCartItem'])->name('remove-cart-item');


// Cart Page Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart-qty-update', [CartController::class, 'updateCartQty'])->name('cart.qty-update');
Route::get('/cart-destroy', [CartController::class, 'cartDestroy'])->name('cart.destroy');

// Cart Coupon Routes
Route::post('/apply-coupon', [HomeController::class, 'applyCoupon'])->name('apply-coupon');
Route::get('/remove-coupon', [HomeController::class, 'removeCoupon'])->name('remove-coupon');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [EndUserDashboardController::class, 'index'])->name('dashboard');

    // Address Routes
    Route::group(['prefix' => 'address', 'as' => 'address.', 'controller' => AddressController::class], function () {
        Route::post('/store', 'store')->name('store');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy');
    });

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

    // Checkout Routes
    Route::group(['prefix' => 'checkout', 'as' => 'checkout.', 'controller' => CheckoutController::class], function () {
        Route::get('/', 'index')->name('index');
        Route::post('/delivery-calculation', 'deliveryCalculation')->name('delivery-calculation');
        Route::post('/redirect', 'checkoutRedirect')->name('redirect');
    });

    // Payment Routes

    Route::controller(PaymentController::class)->group(function () {

        // Payment Routes
        Route::group(['prefix' => 'payment', 'as' => 'payment.'], function () {
            Route::get('/', 'index')->name('index');
            Route::post('/make', 'makePayment')->name('make');
            Route::get('/success', 'paymentSuccess')->name('success');
            Route::get('/cancel', 'paymentCancel')->name('cancel');
        });

        // Paypal Routes
        Route::group(['prefix' => 'paypal', 'as' => 'paypal.'], function () {
            Route::get('/payment', 'payWithPaypal')->name('payment');
            Route::get('/success', 'paypalSuccess')->name('success');
            Route::get('/cancel', 'paypalCancel')->name('cancel');
        });

        // Stripe Routes
        Route::group(['prefix' => 'stripe', 'as' => 'stripe.'], function () {
            Route::get('/payment', 'payWithStripe')->name('payment');
            Route::get('/success', 'stripeSuccess')->name('success');
            Route::get('/cancel', 'stripeCancel')->name('cancel');
        });

        // Razorpay Routes
        Route::get('razorpay/redirect', 'razorpayRedirect')->name('razorpay.redirect');
        Route::post('razorpay/payment', 'payWithRazorpay')->name('razorpay.payment');
    });

    // Chat Routes
    Route::post('chat/send-message',[ChatController::class,'sendMessage'])->name('send-message');
    Route::get('chat/get/{receiverId}', [ChatController::class, 'getChat'])->name('chat.get-chat');

});



require __DIR__ . '/auth.php';
