<?php

use App\Http\Controllers\api\v1\CategoryController;
use App\Http\Controllers\api\v1\ConfiguratorController;
use App\Http\Controllers\api\v1\ConfiguratorProductController;
use App\Http\Controllers\api\v1\ConfiguratorProductTypeController;
use App\Http\Controllers\api\v1\ProductController;
use App\Http\Controllers\api\v1\ProductTypeController;
use App\Http\Controllers\api\v1\SpecificationController;
use App\Http\Controllers\api\v1\SpecificationValueController;
use Illuminate\Support\Facades\Route;


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
    ]
);
