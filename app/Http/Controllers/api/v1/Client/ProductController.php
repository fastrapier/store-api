<?php

namespace App\Http\Controllers\api\v1\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Client\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private readonly ProductService $productService)
    {
    }

    public function index()
    {
        return $this->productService->findAll();
    }

    public function show(int $id)
    {
        return $this->productService->findById($id);
    }
}
