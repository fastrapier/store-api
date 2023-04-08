<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Admin

        $this->app->bind(\App\Services\Admin\ProductService::class, function () {
            return new \App\Services\Admin\impl\ProductServiceImpl();
        });

        $this->app->bind(\App\Services\Admin\CategoryService::class, function () {
            return new \App\Services\Admin\impl\CategoryServiceImpl();
        });

        $this->app->bind(\App\Services\Admin\ProductTypeService::class, function () {
            return new \App\Services\Admin\impl\ProductTypeServiceImpl();
        });

        $this->app->bind(\App\Services\Admin\SpecificationService::class, function () {
            return new \App\Services\Admin\impl\SpecificationServiceImpl();
        });

        //Client

        $this->app->bind(\App\Services\Client\CategoryService::class, function () {
            return new \App\Services\Client\impl\CategoryServiceImpl();
        });

        $this->app->bind(\App\Services\Client\ProductService::class, function () {
            return new \App\Services\Client\impl\ProductServiceImpl();
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
