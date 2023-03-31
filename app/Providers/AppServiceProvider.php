<?php

namespace App\Providers;

use App\Services\CategoryService;
use App\Services\impl\CategoryServiceImpl;
use App\Services\impl\ProductServiceImpl;
use App\Services\ProductService;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
