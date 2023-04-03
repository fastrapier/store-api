<?php

namespace App\Providers;

use App\Services\CategoryService;
use App\Services\impl\CategoryServiceImpl;
use App\Services\impl\ProductServiceImpl;
use App\Services\impl\ProductTypeServiceImpl;
use App\Services\ProductService;
use App\Services\ProductTypeService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductService::class, function() {
            return new ProductServiceImpl();
        });

        $this->app->bind(CategoryService::class, function () {
            return new CategoryServiceImpl();
        });

        $this->app->bind(ProductTypeService::class, function () {
            return new ProductTypeServiceImpl();
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
