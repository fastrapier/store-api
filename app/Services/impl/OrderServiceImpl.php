<?php

namespace App\Services\impl;

use App\Http\Resources\Order\OrderCollection;
use App\Http\Resources\Order\SingleOrderResource;
use App\Models\Order;
use App\Services\OrderService;

class OrderServiceImpl implements OrderService
{

    public function findAll(): OrderCollection
    {
        return new OrderCollection(Order::all());
    }

    public function findById(int $id): SingleOrderResource
    {
        $order = Order::findOrFail($id);

        return new SingleOrderResource($order);
    }

    public function create(array $validated): SingleOrderResource
    {
        $order = Order::create($validated);

        return new SingleOrderResource($order);
    }

    public function update(array $validated, int $id): SingleOrderResource
    {
        $order = Order::findOrFail($id);

        $order->update($validated);

        $order->fresh();

        return new SingleOrderResource($order);
    }

    public function delete(int $id): void
    {
        $order = Order::findOrFail($id);

        $order->delete();
    }
}
