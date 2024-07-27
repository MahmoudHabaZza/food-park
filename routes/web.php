<?php

use App\Events\RTOrderPlacedNotificationEvent;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\EndUser\AddressController;
use App\Http\Controllers\EndUser\CartController;
use App\Http\Controllers\EndUser\ChatController;
use App\Http\Controllers\EndUser\CheckoutController;
use App\Http\Controllers\EndUser\CustomPageController;
use App\Http\Controllers\EndUser\DashboardController as EndUserDashboardController;
use App\Http\Controllers\EndUser\HomeController;
use App\Http\Controllers\EndUser\PaymentController;
use App\Http\Controllers\EndUser\ProfileController as EndUserProfileController;
use App\Http\Controllers\EndUser\WishListController;
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


Route::controller(HomeController::class)->group(function () {
    // Home routes
    Route::get('/', 'index')->name('home');

    // Product routes
    Route::prefix('product')->as('product.')->group(function () {
        Route::get('/','allProducts')->name('index');
        Route::get('{slug}', 'showProduct')->name('show');
        Route::get('load-modal/{productId}', 'loadProductModal')->name('load-modal');
        // Product Review
        Route::post('product-review','productReviewStore')->name('product-review.store');
    });

    // Cart Coupon Routes
    Route::post('/apply-coupon', 'applyCoupon')->name('apply-coupon');
    Route::delete('/remove-coupon', 'removeCoupon')->name('remove-coupon');

    // Chef routes
    Route::get('/chefs', 'chef')->name('chef.index');

    // Testimonial routes
    Route::get('/testimonials', 'testimonials')->name('testimonial.index');

    // Blog routes
    Route::prefix('blogs')->as('blogs.')->group(function () {
        Route::get('/', 'blogs')->name('index');
        Route::get('/{slug}', 'blogDetails')->name('details');
        Route::post('/comment/{blogId}', 'blogCommentStore')->name('comment.store');
    });

    // About
    Route::get('/about', 'about')->name('about');

    // Contact
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'sendMessage')->name('contact.sendMessage');

    // Reservation
    Route::post('reservation','reservation')->name('reservation.store');

    // Subscribe News Letter
    Route::post('subscribe-news-letter','subscribeNewsLetter')->name('subscribe-news-letter');

});

// WishList Routes
Route::get('wishlist/{productId}',[WishListController::class,'store'])->name('wishlist.store');
Route::delete('wishList/{id}',[WishListController::class,'destroy'])->name('wishlist.destroy');

// Custom Page Routes
Route::get('page/{slug}',CustomPageController::class)->name('custom-page');

// Cart Routes
Route::group([
    'controller' => CartController::class,
    'prefix' => 'cart',
    'as' => 'cart.'
],function(){
    Route::get('/','index')->name('index');
    Route::post('add-to-cart','addToCart')->name('addToCart');
    Route::get('cart-products','getCartProducts')->name('getCartProducts');
    Route::get('remove-item/{rowId}','removeCartItem')->name('removeCartItem');
    Route::post('qty-update', 'updateCartQty')->name('updateCartQty');
    Route::get('destroy','cartDestroy')->name('destroy');
});



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
