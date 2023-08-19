<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\AvailableProductService;
use App\Services\impl\AvailableProductServiceImpl;
use App\Services\CategoryService;
use App\Services\ConfigurationService;
use App\Services\DeliveryService;
use App\Services\impl\AuthServiceImpl;
use App\Services\impl\CategoryServiceImpl;
use App\Services\impl\ConfigurationServiceImpl;
use App\Services\impl\DeliveryServiceImpl;
use App\Services\impl\OrderServiceImpl;
use App\Services\impl\PlatformServiceImpl;
use App\Services\impl\ProductServiceImpl;
use App\Services\impl\ProductTypeServiceImpl;
use App\Services\impl\SpecificationServiceImpl;
use App\Services\OrderService;
use App\Services\PlatformService;
use App\Services\ProductService;
use App\Services\ProductTypeService;
use App\Services\SpecificationService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductService::class, function () {
            return new ProductServiceImpl();
        });

        $this->app->bind(CategoryService::class, function () {
            return new CategoryServiceImpl();
        });

        $this->app->bind(ProductTypeService::class, function () {
            return new ProductTypeServiceImpl();
        });

        $this->app->bind(SpecificationService::class, function () {
            return new SpecificationServiceImpl();
        });

        $this->app->bind(OrderService::class, function () {
            return new OrderServiceImpl();
        });

        $this->app->bind(AuthService::class, function () {
            return new AuthServiceImpl();
        });


        $this->app->bind(DeliveryService::class, function () {
            return new DeliveryServiceImpl();
        });

        $this->app->bind(ConfigurationService::class, function () {
            return new ConfigurationServiceImpl();
        });

        $this->app->bind(AvailableProductService::class, function () {
            return new AvailableProductServiceImpl();
        });

        $this->app->bind(PlatformService::class, function () {
            return new PlatformServiceImpl();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
