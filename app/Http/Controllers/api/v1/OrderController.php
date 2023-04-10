<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(private readonly OrderService $orderService)
    {
        $this->middleware('auth.role:admin', ['only' => ['update', 'destroy']]);
        $this->middleware('auth.role:user,admin', ['only' => ['index', 'show', 'store']]);
    }

    public function index()
    {
        return $this->orderService->findAll();
    }

    public function store(StoreOrderRequest $request)
    {
        $validated = $request->validated();
        /*
         * @TODO: add products validation
         * */
        return $this->orderService->create($validated);
    }

    public function show(int $id)
    {
        return $this->orderService->findById($id);
    }

    public function update(Request $request, int $id)
    {
        return response()->json([
            'success' => false,
            'message' => 'Unimplemented'
        ], 400);
    }

    public function destroy(int $id)
    {
        $this->orderService->delete($id);

        return response()->json(null, 204);
    }
}
