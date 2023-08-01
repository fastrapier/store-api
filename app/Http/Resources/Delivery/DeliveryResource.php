<?php

namespace App\Http\Resources\Delivery;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Delivery */
class DeliveryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'cost' => $this->cost,
            'categories' => !empty($this->categories) ? array_map('intval', explode(",", $this->categories)) : [],
            'categories_price' => $this->categories_price,
            'position' => $this->position,
            'is_active' => $this->is_active,
        ];
    }
}
