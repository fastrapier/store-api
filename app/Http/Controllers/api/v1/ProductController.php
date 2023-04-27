<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\DeleteProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

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

        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img')->store('public/images/products');
            $validated['img'] = Storage::url($validated['img']);
        }
        else
        {
            $validated['img'] = "test.jpg";
        }

        return $this->productService->create($validated);
    }

    public function show(int $id)
    {
        return $this->productService->findById($id);
    }

    public function update(UpdateProductRequest $request, int $id)
    {
        $validated = $request->validated();

        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img')->store('public/images/products');
            $validated['img'] = Storage::url($validated['img']);
        }

        return $this->productService->update($validated, $id);
    }

    public function destroy(int $id)
    {
        $this->productService->delete($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function destroyByIds(DeleteProductRequest $request)
    {
        $validated = $request->validated();

        $this->productService->deleteByIds($validated['ids']);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
