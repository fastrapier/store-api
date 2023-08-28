<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'max:255|string',
            'retail_price' => 'numeric',
            'configurator_price' => 'numeric',
            'in_stock' => 'bool',
            'use_in_configurator' => 'boolean',
            'description' => 'string|max:500',
            'category_id' => 'integer|exists:categories,id',
            'product_type_id' => 'integer|exists:product_types,id',
            'specification_values' => 'nullable|string',
            'img' => "file|nullable"
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
