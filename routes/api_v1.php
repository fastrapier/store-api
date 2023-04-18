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


//Mass delete
Route::delete('categories', [CategoryController::class, 'destroyByIds']);
Route::delete('products', [ProductController::class, 'destroyByIds']);
Route::delete('product_types', [ProductTypeController::class, 'destroyByIds']);



Route::apiResources(
    [
        'categories' => CategoryController::class,
        'product_types' => ProductTypeController::class,
        'specifications' => SpecificationController::class,
        'products' => ProductController::class,
        'specification_values' => SpecificationValueController::class,
        'configurators' => ConfiguratorController::class,
        'configurator_product_types' => ConfiguratorProductTypeController::class,
        'configurator_products' => ConfiguratorProductController::class,
        'order' => OrderController::class
    ]
);

