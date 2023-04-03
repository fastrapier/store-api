<?php

namespace App\Http\Resources\Specification;

use App\Http\Resources\ProductType\ProductTypeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Specification */
class SingleSpecificationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'success' => true,
            'data' => [
                'id' => $this->id,
                'name' => $this->name,
            ]];
    }
}
