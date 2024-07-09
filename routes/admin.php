<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\BannderSliderController;
use App\Http\Controllers\Admin\BannerSliderController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DailyOfferController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeliveryAreaController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentGatewaySettingController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {


    // Admin Login Routes
    Route::middleware('guest')->group(function () {
        Route::get('login', [AdminAuthController::class, 'create'])->name('login');
        Route::post('login', [AdminAuthController::class, 'store'])->name('login');
    });

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::post('logout', [AdminAuthController::class, 'destroy'])->name('logout');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Profile Routes
        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
        Route::put('profile/update_password', [ProfileController::class, 'updatePassword'])->name('profile.update_password');

        // Slider Routes
        Route::resource('Slider', SliderController::class);
        // Why Choose Us Routes
        // if you have another method belongs to your resource controller , you must implement it before the resource controller
        Route::put('why-choose-title-update', [WhyChooseUsController::class, 'updateTitle'])->name('why-choose.title');
        Route::resource('why-choose-us', WhyChooseUsController::class);
        // Category Roues
        Route::resource('category', CategoryController::class);
        // Product Routes
        Route::resource('product', ProductController::class);
        // Product Gallery
        Route::group(
            [
                'prefix' => 'product-gallery',
                'as' => 'product.gallery.',
                'controller' => ProductGalleryController::class,
            ],
            function () {
                Route::get('/{product}', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::delete('/{product}', 'destroy')->name('destroy');
            }
        );
        // Product Size
        Route::group(
            [
                'prefix' => 'product-size',
                'as' => 'product.size.',
                'controller' => ProductSizeController::class,
            ],
            function () {
                Route::get('/{product}', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::delete('/{product}', 'destroy')->name('destroy');
            }
        );
        //Product Variants
        Route::group(
            [
                'prefix' => 'product-option',
                'as' => 'product.option.',
                'controller' => ProductOptionController::class,
            ],
            function () {
                Route::post('/', 'store')->name('store');
                Route::delete('/{product}', 'destroy')->name('destroy');
            }
        );

        // Coupon Routes
        Route::resource('coupon',CouponController::class);

        // Delivery Area Routes
        Route::resource('delivery-area',DeliveryAreaController::class);

        // Order Routes
        Route::group(['prefix' => 'orders','as' => 'order.' , 'controller' => OrderController::class],function(){
            Route::get('/','index')->name('index');
            Route::get('pending','pendingOrderIndex')->name('pending');
            Route::get('in-process','inProcessOrderIndex')->name('inprocess');
            Route::get('delivered','deliveredOrderIndex')->name('delivered');
            Route::get('declined','declinedOrderIndex')->name('declined');
            Route::get('/{id}','show')->name('show');
            Route::put('/{id}/update-status','updateOrderStatus')->name('status.update');
            Route::put('/status/{id}','getOrderStatus')->name('status.get');
            Route::delete('/{id}','destroy')->name('destroy');
        });


        // Notification Routes
        Route::get('clear-notification',[DashboardController::class,'clearNotification'])->name('clear-notification');

        // Chat Routes
        Route::get('chat',[ChatController::class,'index'])->name('chat.index');
        Route::get('chat/get/{senderId}',[ChatController::class,'getChat'])->name('chat.get-chat');
        Route::post('chat/send-message', [ChatController::class, 'sendMessage'])->name('chat.send-message');

        // Daily Offer Routes
        Route::get('daily-offer/search-product',[DailyOfferController::class,'searchProduct'])->name('daily-offer.search');
        Route::put('daily-offer-title-update', [DailyOfferController::class, 'updateTitle'])->name('daily-offer.title');
        Route::resource('daily-offer',DailyOfferController::class);

        // Banner Slider Routes
        Route::resource('banner-slider',BannerSliderController::class);

        // Chef Routes
        Route::put('chef-title-update', [ChefController::class, 'updateTitle'])->name('chef.title');
        Route::resource('chef',ChefController::class);

        // Testimonial Routes
        Route::put('testimonial-title-update', [TestimonialController::class, 'updateTitle'])->name('testimonial.title');
        Route::resource('testimonial', TestimonialController::class);

        // counter routes
        Route::get('counter',[CounterController::class,'index'])->name('counter.index');
        Route::put('counter',[CounterController::class,'update'])->name('counter.update');

        // Blog Categories routes
        Route::resource('blog-categories',BlogCategoryController::class);

        // Settings Routes
        Route::group([
            'prefix' => 'setting',
            'as' => 'setting.',
            'controller' => SettingController::class
        ], function () {
            Route::get('/', 'index')->name('index');
            Route::put('/general-settings', 'updateGeneralSettings')->name('general-settings.update');
            Route::put('/pusher-settings', 'updatePusherSettings')->name('pusher-settings.update');

        });

        // Payment Gateways Setting Routes
        Route::get('payment-gateways',[PaymentGatewaySettingController::class,'index'])->name('payment-gateways.index');
        Route::put('paypal-settings-update',[PaymentGatewaySettingController::class,'paypalSettingsUpdate'])->name('paypal.settings.update');
        Route::put('stripe-settings-update',[PaymentGatewaySettingController::class,'stripeSettingUpdate'])->name('stripe.settings.update');
        Route::put('razorpay-settings-update',[PaymentGatewaySettingController::class,'razorpaySettingUpdate'])->name('razorpay.settings.update');



    });
});
