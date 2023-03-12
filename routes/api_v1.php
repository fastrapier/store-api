<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources(
    [
        'categories' => \App\Http\Controllers\api\v1\CategoryController::class,
        'product_types' => \App\Http\Controllers\api\v1\ProductTypeController::class,
        'specifications' => \App\Http\Controllers\api\v1\SpecificationController::class,
        'products' => \App\Http\Controllers\api\v1\ProductController::class,
        'specification_values' => \App\Http\Controllers\api\v1\SpecificationValueController::class,
    ]
);
