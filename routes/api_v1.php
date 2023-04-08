<?php

use App\Http\Controllers\api\v1\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\api\v1\Admin\ConfiguratorController as AdminConfiguratorController;
use App\Http\Controllers\api\v1\Admin\ConfiguratorProductController as AdminConfiguratorProductController;
use App\Http\Controllers\api\v1\Admin\ConfiguratorProductTypeController as AdminConfiguratorProductTypeController;
use App\Http\Controllers\api\v1\Admin\ProductController as AdminProductController;
use App\Http\Controllers\api\v1\Admin\ProductTypeController as AdminProductTypeController;
use App\Http\Controllers\api\v1\Admin\SpecificationController as AdminSpecificationController;
use App\Http\Controllers\api\v1\Admin\SpecificationValueController as AdminSpecificationValueController;
use App\Http\Controllers\api\v1\Client\AuthController as ClientAuthController;
use App\Http\Controllers\api\v1\Client\CategoryController as ClientCategoryController;
use App\Http\Controllers\api\v1\Client\ProductController as ClientProductController;
use Illuminate\Support\Facades\Route;


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [ClientAuthController::class, 'login']);
    Route::post('logout', [ClientAuthController::class, 'logout']);
    Route::post('refresh', [ClientAuthController::class, 'refresh']);
    Route::get('user', [ClientAuthController::class, 'user']);
    Route::post("signup", [ClientAuthController::class, 'signUp']);
});

Route::group([
    'middleware' => 'auth.role:admin',
    'prefix' => 'admin'
], function ($router) {
    Route::apiResources(
        [
            'categories' => AdminCategoryController::class,
            'product_types' => AdminProductTypeController::class,
            'specifications' => AdminSpecificationController::class,
            'products' => AdminProductController::class,
            'specification_values' => AdminSpecificationValueController::class,
            'configurators' => AdminConfiguratorController::class,
            'configurator_product_types' => AdminConfiguratorProductTypeController::class,
            'configurator_products' => AdminConfiguratorProductController::class,
        ]
    );
});
Route::group([
    'middleware' => 'api',
], function () {
    Route::apiResource('categories', ClientCategoryController::class)->only(['show', 'index']);
    Route::apiResource('products', ClientProductController::class)->only(['show', 'index']);
});


