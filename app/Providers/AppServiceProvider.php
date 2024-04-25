<?php

namespace App\Providers;

use App\Interfaces\Admin\ProfileRepositoryInterface;
use App\Interfaces\EndUser\ProfileRepositoryInterface as EndUserProfileRepositoryInterface;
use App\Repositories\Admin\ProfileRepository;
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
        $this->app->bind(ProfileRepositoryInterface::class,ProfileRepository::class);
        $this->app->bind(EndUserProfileRepositoryInterface::class,EndUserProfileRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
