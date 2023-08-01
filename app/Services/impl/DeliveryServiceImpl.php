<?php

namespace App\Services\impl;

use App\Http\Resources\Delivery\DeliveryResource;
use App\Models\Delivery;
use App\Services\DeliveryService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DeliveryServiceImpl implements DeliveryService
{

    public function findAll(): AnonymousResourceCollection
    {

        $deliveries = Delivery::all();

        return DeliveryResource::collection($deliveries);
    }

    public function findById(Delivery $delivery): DeliveryResource
    {
        return new DeliveryResource($delivery);
    }

    public function create(array $validated): DeliveryResource
    {
        $delivery = Delivery::create($validated);

        return new DeliveryResource($delivery);
    }

    public function update(array $validated, Delivery $delivery): DeliveryResource
    {
        if(!empty($validated['categories']) && !empty($validated['categories_price']))
        {
            $validated['categories'] = implode(",", $validated['categories']);
        }

        $delivery->update($validated);

        $delivery = $delivery->fresh();

        return new DeliveryResource($delivery);
    }

    public function delete(Delivery $delivery): void
    {
        $delivery->delete();
    }
}
