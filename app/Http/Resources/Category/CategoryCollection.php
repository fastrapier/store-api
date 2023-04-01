<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\Category */
class CategoryCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'result' => true,
            'data' => $this->collection,
        ];
    }
}
