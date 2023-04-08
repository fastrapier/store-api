<?php

namespace App\Http\Resources\Client\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\Product */
class PaginatedProductCollection extends ResourceCollection
{
    protected array $pagination;

    public function __construct($resource)
    {

        $this->pagination = [
            'total' => $resource->total(), // all models count
            'count' => $resource->count(), // paginated result count
            'per_page' => $resource->perPage(),
            'current_page' => $resource->currentPage(),
            'total_pages' => $resource->lastPage(),
        ];

        $resource = $resource->getCollection();

        parent::__construct($resource);
    }

    public function toArray(Request $request): array
    {
        return [
            'data' => PaginatedProductResource::collection($this->collection),
            'pagination' => $this->pagination
        ];
    }
}
