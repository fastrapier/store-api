<?php

namespace App\Http\Requests\Product\AvailableProduct;

use Illuminate\Foundation\Http\FormRequest;

class StoreAvailableProductsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'for_product_id' => 'required|integer',
            'configurations' => 'required|array',
            'configurations.*.configuration_id' => 'required|integer|exists:configurations,id',
            'configurations.*.available_products_ids' => 'required|array',
            'configurations.*.available_products_ids.*' => 'required|integer|exists:products,id'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
