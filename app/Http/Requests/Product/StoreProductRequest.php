<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|max:255|string',
            'retail_price' => 'required|numeric',
            'configurator_price' => 'required|numeric',
            'in_stock' => 'required|bool',
            'img' => 'image|nullable',
            'use_in_configurator' => 'required|boolean',
            'description' => 'string|max:500|nullable',
            'category_id' => 'required|integer',
            'product_type_id' => 'required|integer',
            'specification_values' => "nullable|string",
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
