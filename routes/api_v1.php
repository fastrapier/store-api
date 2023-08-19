<?php

use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\AvailableProductController;
use App\Http\Controllers\api\v1\CategoryController;
use App\Http\Controllers\api\v1\ConfigurationController;
use App\Http\Controllers\api\v1\DeliveryController;
use App\Http\Controllers\api\v1\ProductController;
use App\Http\Controllers\api\v1\ProductTypeController;
use App\Http\Controllers\api\v1\SpecificationController;
use App\Http\Controllers\api\v1\SpecificationValueController;
use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user', [AuthController::class, 'user']);
    Route::post("signup", [AuthController::class, 'signUp']);
    Route::post('admin/login', [AuthController::class, 'adminLogin']);
});

Route::prefix('category')->controller(CategoryController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{category}', 'show');
    Route::match(['put', 'patch'], '/{category}', 'update');
    Route::delete('/{category}', 'destroy');
});

Route::prefix('productType')->controller(ProductTypeController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{productType}', 'show');
    Route::match(['put', 'patch'], '/{productType}', 'update');
    Route::delete('/{productType}', 'destroy');
});

Route::prefix("productType/{productType}/specification")->controller(SpecificationController::class)->group(function () {
    Route::post('/', 'store');
    Route::match(['put', 'patch'], '/{specification}', 'update');
    Route::delete('/{specification}', 'destroy');
});
Route::prefix('productType/{productType}/configuration')->controller(ConfigurationController::class)->group(function () {
    Route::post('/', 'store');
    Route::match(['put', 'patch'], '/{configuration}', 'update');
    Route::delete('/{configuration}', 'destroy');
    Route::get("/{configuration}", 'show');
});

Route::prefix('products/{product}/availableProducts')->controller(AvailableProductController::class )->group(function () {
    Route::post('/', 'store');
});

Route::prefix('products')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{product}', 'show');
    Route::match(['put', 'patch'], '/{product}', 'update');
    Route::delete('/{product}', 'destroy');
});

Route::prefix('specificationValue')->controller(SpecificationValueController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{specificationValue}', 'show');
    Route::match(['put', 'patch'], '/{specificationValue}', 'update');
    Route::delete('/{specificationValue}', 'destroy');
});

Route::prefix('delivery')->controller(DeliveryController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{delivery}', 'show');
    Route::match(['put', 'patch'], '/{delivery}', 'update');
    Route::delete('/{delivery}', 'destroy');
});
