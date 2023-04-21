<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'max:255|string',
            'article' => 'max:255|unique:products|string',
            'retail_price' => 'numeric',
            'configurator_price' => 'numeric',
            'in_stock' => 'bool',
            'description' => 'string|max:500',
            'category_id' => 'integer',
            'product_type_id' => 'integer',
            'specification_values.*' => 'nullable|array|required_array_keys:specification_id,value',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
