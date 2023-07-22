<?php

use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\CategoryController;
use App\Http\Controllers\api\v1\ConfiguratorController;
use App\Http\Controllers\api\v1\ConfiguratorProductController;
use App\Http\Controllers\api\v1\ConfiguratorProductTypeController;
use App\Http\Controllers\api\v1\OrderController;
use App\Http\Controllers\api\v1\ProductController;
use App\Http\Controllers\api\v1\ProductTypeController;
use App\Http\Controllers\api\v1\SpecificationController;
use App\Http\Controllers\api\v1\SpecificationValueController;
use Illuminate\Support\Facades\Route;
use \Illuminate\Http\Request;

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
