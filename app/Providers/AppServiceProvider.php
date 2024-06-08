<?php

namespace App\Providers;

use App\Interfaces\Admin\CategoryRepositoryInterface;
use App\Interfaces\Admin\CouponRepositoryInterface;
use App\Interfaces\Admin\DeliveryAreaRepositoryInterface;
use App\Interfaces\Admin\ProductGalleryRepositoryInterface;
use App\Interfaces\Admin\ProductOptionRepositoryInterface;
use App\Interfaces\Admin\ProductRepositoryInterface;
use App\Interfaces\Admin\ProductSizeRepositoryInterface;
use App\Interfaces\Admin\ProfileRepositoryInterface;
use App\Interfaces\Admin\SettingRepositoryInterface;
use App\Interfaces\Admin\SliderRepositoryInterface;
use App\Interfaces\Admin\WhyChooseUsRepositoryInterface;
use App\Interfaces\EndUser\AddressRepositoryInterface;
use App\Interfaces\EndUser\CartRepositoryInterface;
use App\Interfaces\EndUser\CheckoutRepositoryInterface;
use App\Interfaces\EndUser\DashboardRepositoryInterface;
use App\Interfaces\EndUser\HomeRepositoryInterface;
use App\Interfaces\EndUser\ProfileRepositoryInterface as EndUserProfileRepositoryInterface;
use App\Repositories\Admin\CategoryRepository;
use App\Repositories\Admin\CouponRepository;
use App\Repositories\Admin\DeliveryAreaRepository;
use App\Repositories\Admin\ProductGalleryRepository;
use App\Repositories\Admin\ProductOptionRepository;
use App\Repositories\Admin\ProductRepository;
use App\Repositories\Admin\ProductSizeRepository;
use App\Repositories\Admin\ProfileRepository;
use App\Repositories\Admin\SettingRepository;
use App\Repositories\Admin\SliderRepository;
use App\Repositories\Admin\WhyChooseUsRepository;
use App\Repositories\EndUser\AddressRepository;
use App\Repositories\EndUser\CartRepository;
use App\Repositories\EndUser\CheckoutRepository;
use App\Repositories\EndUser\DashboardRepository;
use App\Repositories\EndUser\HomeRepository;
use App\Repositories\EndUser\ProfileRepository as EndUserProfileRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
