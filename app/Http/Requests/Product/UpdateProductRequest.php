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
            'category_id' => 'integer',
            'product_type_id' => 'integer',
            'specification_values' => 'nullable|string',
            'img' => "file|string"
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
