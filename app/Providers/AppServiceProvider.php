<?php

namespace App\Providers;

use App\Interfaces\Admin\ProfileRepositoryInterface;
use App\Repositories\Admin\ProfileRepository;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
