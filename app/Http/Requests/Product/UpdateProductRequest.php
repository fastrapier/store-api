<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|max:255|string',
            'retail_price' => 'required|numeric',
            'configurator_price' => 'required|numeric',
            'in_stock' => 'required|bool',
            'use_in_configurator' => 'required|boolean',
            'description' => 'required|string|max:500',
            'category_id' => 'required|integer|exists:categories,id',
            'product_type_id' => 'required|integer|exists:product_types,id',
            'specification_values' => 'nullable|string',
            'img' => "file|nullable"
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
