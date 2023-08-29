<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function __construct(private readonly ProductService $productService)
    {
        $this->middleware('auth.role:admin', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return $this->productService->findAll();
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $validated['specification_values'] = json_decode($validated['specification_values'], true);

        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img')->store('public/images/products');
            $validated['img'] = Storage::url($validated['img']);
        } else {
            $validated['img'] = "public/images/no_image.jpg";
        }

        return $this->productService->create($validated);
    }

    public function show(Product $product)
    {
        return $this->productService->find($product);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        if(!empty($validated['specification_values']))
        {
            $validated['specification_values'] = json_decode($validated['specification_values'], true);
        }


        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img')->store('public/images/products');
            $validated['img'] = Storage::url($validated['img']);
        }

        return $this->productService->update($validated, $product);
    }

    public function destroy(Product $product)
    {
        $this->productService->delete($product);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
