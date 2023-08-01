<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Delivery\DeliveryStoreRequest;
use App\Http\Requests\Delivery\DeliveryUpdateRequest;
use App\Models\Delivery;
use App\Services\DeliveryService;

class DeliveryController extends Controller
{
    public function __construct(private readonly DeliveryService $deliveryService)
    {
//        $this->middleware('auth.role:admin', ['only' => ['update', 'destroy']]);
//        $this->middleware('auth.role:user,admin', ['only' => ['index', 'show', 'store']]);
    }

    public function index() {
        return $this->deliveryService->findAll();
    }

    public function show(Delivery $delivery) {
        return $this->deliveryService->findById($delivery);
    }

    public function store(DeliveryStoreRequest $request) {
        $validated = $request->validated();

        return $this->deliveryService->create($validated);
    }

    public function update(DeliveryUpdateRequest $request, Delivery $delivery) {
        $validated = $request->validated();

        return $this->deliveryService->update($validated, $delivery);
    }

    public function delete(Delivery $delivery) {
        return $this->deliveryService->delete($delivery);
    }
}
