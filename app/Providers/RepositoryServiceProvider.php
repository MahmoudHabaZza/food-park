<?php

namespace App\Providers;

use App\Interfaces\Admin\AboutRepositoryInterface;
use App\Interfaces\Admin\BannerSliderRepositoryInterface;
use App\Interfaces\Admin\BlogCategoryRepositoryInterface;
use App\Interfaces\Admin\BlogRepositoryInterface;
use App\Interfaces\Admin\CategoryRepositoryInterface;
use App\Interfaces\Admin\ChatRepositoryInterface;
use App\Interfaces\Admin\ChefRepositoryInterface;
use App\Interfaces\Admin\CommentRepositoryInterface;
use App\Interfaces\Admin\ContactRepositoryInterface;
use App\Interfaces\Admin\CounterRepositoryInterface;
use App\Interfaces\Admin\CouponRepositoryInterface;
use App\Interfaces\Admin\DailyOfferRepositoryInterface;
use App\Interfaces\Admin\DeliveryAreaRepositoryInterface;
use App\Interfaces\Admin\OrderRepositoryInterface;
use App\Interfaces\Admin\PaymentGatewaySettingRepositoryInterface;
use App\Interfaces\Admin\ProductGalleryRepositoryInterface;
use App\Interfaces\Admin\ProductOptionRepositoryInterface;
use App\Interfaces\Admin\ProductRepositoryInterface;
use App\Interfaces\Admin\ProductSizeRepositoryInterface;
use App\Interfaces\Admin\ProfileRepositoryInterface;
use App\Interfaces\Admin\SettingRepositoryInterface;
use App\Interfaces\Admin\SliderRepositoryInterface;
use App\Interfaces\Admin\TestimonialRepositoryInterface;
use App\Interfaces\Admin\WhyChooseUsRepositoryInterface;
use App\Interfaces\EndUser\AddressRepositoryInterface;
use App\Interfaces\EndUser\CartRepositoryInterface;
use App\Interfaces\EndUser\ChatRepositoryInterface as EndUserChatRepositoryInterface;
use App\Interfaces\EndUser\CheckoutRepositoryInterface;
use App\Interfaces\EndUser\DashboardRepositoryInterface;
use App\Interfaces\EndUser\HomeRepositoryInterface;
use App\Interfaces\EndUser\PaymentRepositoryInterface;
use App\Interfaces\EndUser\ProfileRepositoryInterface as EndUserProfileRepositoryInterface;
use App\Repositories\Admin\AboutRepository;
use App\Repositories\Admin\BannerSliderRepository;
use App\Repositories\Admin\BlogCategoryRepository;
use App\Repositories\Admin\BlogRepository;
use App\Repositories\Admin\CategoryRepository;
use App\Repositories\Admin\ChatRepository;
use App\Repositories\Admin\ChefRepository;
use App\Repositories\Admin\CommentRepository;
use App\Repositories\Admin\ContactRepository;
use App\Repositories\Admin\CounterRepository;
use App\Repositories\Admin\CouponRepository;
use App\Repositories\Admin\DailyOfferRepository;
use App\Repositories\Admin\DeliveryAreaRepository;
use App\Repositories\Admin\OrderRepository;
use App\Repositories\Admin\PaymentGatewaySettingRepository;
use App\Repositories\Admin\ProductGalleryRepository;
use App\Repositories\Admin\ProductOptionRepository;
use App\Repositories\Admin\ProductRepository;
use App\Repositories\Admin\ProductSizeRepository;
use App\Repositories\Admin\ProfileRepository;
use App\Repositories\Admin\SettingRepository;
use App\Repositories\Admin\SliderRepository;
use App\Repositories\Admin\TestimonialRepository;
use App\Repositories\Admin\WhyChooseUsRepository;
use App\Repositories\EndUser\AddressRepository;
use App\Repositories\EndUser\CartRepository;
use App\Repositories\EndUser\ChatRepository as EndUserChatRepository;
use App\Repositories\EndUser\CheckoutRepository;
use App\Repositories\EndUser\DashboardRepository;
use App\Repositories\EndUser\HomeRepository;
use App\Repositories\EndUser\PaymentRepository;
use App\Repositories\EndUser\ProfileRepository as EndUserProfileRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);
        $this->app->bind(EndUserProfileRepositoryInterface::class, EndUserProfileRepository::class);
        $this->app->bind(SliderRepositoryInterface::class, SliderRepository::class);
        $this->app->bind(WhyChooseUsRepositoryInterface::class, WhyChooseUsRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(ProductGalleryRepositoryInterface::class, ProductGalleryRepository::class);
        $this->app->bind(ProductSizeRepositoryInterface::class, ProductSizeRepository::class);
        $this->app->bind(ProductOptionRepositoryInterface::class, ProductOptionRepository::class);
        $this->app->bind(HomeRepositoryInterface::class, HomeRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind(CartRepositoryInterface::class, CartRepository::class);
        $this->app->bind(CouponRepositoryInterface::class, CouponRepository::class);
        $this->app->bind(DeliveryAreaRepositoryInterface::class, DeliveryAreaRepository::class);
        $this->app->bind(DashboardRepositoryInterface::class, DashboardRepository::class);
        $this->app->bind(AddressRepositoryInterface::class, AddressRepository::class);
        $this->app->bind(CheckoutRepositoryInterface::class, CheckoutRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
        $this->app->bind(PaymentGatewaySettingRepositoryInterface::class, PaymentGatewaySettingRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(ChatRepositoryInterface::class, ChatRepository::class);
        $this->app->bind(EndUserChatRepositoryInterface::class, EndUserChatRepository::class);
        $this->app->bind(DailyOfferRepositoryInterface::class, DailyOfferRepository::class);
        $this->app->bind(BannerSliderRepositoryInterface::class, BannerSliderRepository::class);
        $this->app->bind(ChefRepositoryInterface::class, ChefRepository::class);
        $this->app->bind(TestimonialRepositoryInterface::class, TestimonialRepository::class);
        $this->app->bind(CounterRepositoryInterface::class, CounterRepository::class);
        $this->app->bind(BlogCategoryRepositoryInterface::class, BlogCategoryRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->bind(AboutRepositoryInterface::class, AboutRepository::class);
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}