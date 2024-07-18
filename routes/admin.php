<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminManagementController;
use App\Http\Controllers\Admin\BannderSliderController;
use App\Http\Controllers\Admin\BannerSliderController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\ClearDataBaseController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DailyOfferController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeliveryAreaController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\MenuBuilderController;
use App\Http\Controllers\Admin\NewsLetterController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PageBuilderController;
use App\Http\Controllers\Admin\PaymentGatewaySettingController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\ProductRatingController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\ReservationTimeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocialLinkController;
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
        Route::resource('coupon', CouponController::class);

        // Delivery Area Routes
        Route::resource('delivery-area', DeliveryAreaController::class);

        // Order Routes
        Route::group(['prefix' => 'orders', 'as' => 'order.', 'controller' => OrderController::class], function () {
            Route::get('/', 'index')->name('index');
            Route::get('pending', 'pendingOrderIndex')->name('pending');
            Route::get('in-process', 'inProcessOrderIndex')->name('inprocess');
            Route::get('delivered', 'deliveredOrderIndex')->name('delivered');
            Route::get('declined', 'declinedOrderIndex')->name('declined');
            Route::get('/{id}', 'show')->name('show');
            Route::put('/{id}/update-status', 'updateOrderStatus')->name('status.update');
            Route::get('/status/{id}', 'getOrderStatus')->name('status.get');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });


        // Notification Routes
        Route::get('clear-notification', [DashboardController::class, 'clearNotification'])->name('clear-notification');

        // Chat Routes
        Route::group([
            'controller' => ChatController::class,
            'prefix' => 'chat',
            'as' => 'chat.',
            'middleware' => 'superAdmin'
        ], function () {
            Route::get('/', 'index')->name('index');
            Route::get('get/{senderId}', 'getChat')->name('get-chat');
            Route::post('send-message', 'sendMessage')->name('send-message');
        });

        // Daily Offer Routes
        Route::get('daily-offer/search-product', [DailyOfferController::class, 'searchProduct'])->name('daily-offer.search');
        Route::put('daily-offer-title-update', [DailyOfferController::class, 'updateTitle'])->name('daily-offer.title');
        Route::resource('daily-offer', DailyOfferController::class);

        // Banner Slider Routes
        Route::resource('banner-slider', BannerSliderController::class);

        // Chef Routes
        Route::put('chef-title-update', [ChefController::class, 'updateTitle'])->name('chef.title');
        Route::resource('chef', ChefController::class);

        // Testimonial Routes
        Route::put('testimonial-title-update', [TestimonialController::class, 'updateTitle'])->name('testimonial.title');
        Route::resource('testimonial', TestimonialController::class);

        // counter routes
        Route::get('counter', [CounterController::class, 'index'])->name('counter.index');
        Route::put('counter', [CounterController::class, 'update'])->name('counter.update');

        // Blog Categories routes
        Route::resource('blog-categories', BlogCategoryController::class);
        // Blog Routes
        Route::resource('blogs', BlogController::class);
        // Blog Comment Routes
        Route::group([
            'controller' => CommentController::class,
            'prefix' => 'blog-comments',
            'as' => 'blog-comments.'
        ], function () {
            Route::get('/', 'index')->name('index');
            Route::put('update-status/{id}', 'updateStatus')->name('updateStatus');
            Route::delete('{id}', 'destroy')->name('destroy');
        });

        // About Us Routes
        Route::get('about', [AboutController::class, 'index'])->name('about.index');
        Route::put('about', [AboutController::class, 'update'])->name('about.update');

        // Contact Us Routes
        Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
        Route::put('contact', [ContactController::class, 'update'])->name('contact.update');

        // Footer Routes
        Route::get('footer-info', [FooterInfoController::class, 'index'])->name('footer-info.index');
        Route::put('footer-info', [FooterInfoController::class, 'update'])->name('footer-info.update');


        // Menu Builder Controller
        Route::get('menu-builder',[MenuBuilderController::class,'index'])->name('menu-builder.index');

        // Page Builder Routes
        Route::resource('page-builder',PageBuilderController::class);

        // Reservation Time Routes
        Route::resource('reservation-times', ReservationTimeController::class);

        // Reservation
        Route::group(['controller' => ReservationController::class, 'prefix' => 'reservation', 'as' => 'reservation.'], function () {
            Route::get('/', 'index')->name('index');
            Route::put('/status', 'updateStatus')->name('updateStatus');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });
        // Product Reviews
        Route::group(['controller' => ProductRatingController::class, 'prefix' => 'product-rating', 'as' => 'product-rating.'], function () {
            Route::get('/', 'index')->name('index');
            Route::put('/status', 'updateStatus')->name('updateStatus');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // newsLetter Routes
        Route::prefix('news-letter')->name('news-letter.')->controller(NewsLetterController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/send', 'sendNewsletter')->name('send');
            Route::delete('/{id}', 'destroyEmail')->name('destroy');
        });

        // social links
        Route::resource('social-links',SocialLinkController::class);

        // Admin Management Routes
        Route::resource('admin-management',AdminManagementController::class)->middleware('superAdmin');

        // Settings Routes
        Route::group([
            'prefix' => 'setting',
            'as' => 'setting.',
            'controller' => SettingController::class
        ], function () {
            Route::get('/', 'index')->name('index');
            Route::put('/general-settings', 'updateGeneralSettings')->name('general-settings.update');
            Route::put('/pusher-settings', 'updatePusherSettings')->name('pusher-settings.update');
            Route::put('/mail-settings', 'updateMailSettings')->name('mail-settings.update');
            Route::put('/logo-settings', 'updateLogoSettings')->name('logo-settings.update');
            Route::put('/appearance-settings', 'updateAppearanceSettings')->name('appearance-settings.update');
            Route::put('/seo-settings', 'updateSeoSettings')->name('seo-settings.update');
        });

        // Payment Gateways Setting Routes
        Route::controller(PaymentGatewaySettingController::class)->group(function () {
            Route::get('payment-gateways', 'index')->name('payment-gateways.index');
            Route::put('paypal-settings-update', 'paypalSettingsUpdate')->name('paypal.settings.update');
            Route::put('stripe-settings-update', 'stripeSettingUpdate')->name('stripe.settings.update');
            Route::put('razorpay-settings-update', 'razorpaySettingUpdate')->name('razorpay.settings.update');
        });
    });


    // Clear Database Routes
    Route::get('clear-database',[ClearDataBaseController::class,'index'])->name('clear-database.index');

});
