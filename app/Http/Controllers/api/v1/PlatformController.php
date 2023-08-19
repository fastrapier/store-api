<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Platform\PlatformRequest;
use App\Models\Platform;
use App\Models\Product;
use App\Services\PlatformService;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function __construct(private readonly PlatformService $productService)
    {
        $this->middleware('auth.role:admin');
    }
    public function store(PlatformRequest $request, Product $product)
    {
        $validated = $request->validated();

        return $this->productService->store($validated, $product);
    }

}
