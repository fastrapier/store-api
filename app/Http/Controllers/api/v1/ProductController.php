<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\DeleteProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

use App\Services\ProductService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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

    public function show(int $id)
    {
        return $this->productService->findById($id);
    }

    public function update(UpdateProductRequest $request, int $id)
    {
        $validated = $request->validated();

        $validated['specification_values'] = json_decode($validated['specification_values'], true);

//        dd($validated);

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
