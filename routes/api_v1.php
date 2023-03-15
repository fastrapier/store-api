<?php

use App\Http\Controllers\api\v1\CategoryController;
use App\Http\Controllers\api\v1\ConfiguratorController;
use App\Http\Controllers\api\v1\ConfiguratorProductsController;
use App\Http\Controllers\api\v1\ConfiguratorProductTypesController;
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
        'configurator_product_types' => ConfiguratorProductTypesController::class,
        'configurator_products' => ConfiguratorProductsController::class,
    ]
);
