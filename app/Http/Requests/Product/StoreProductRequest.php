<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|max:255|string',
            'article' => 'required|max:255|unique:products|string',
            'retail_price' => 'required|numeric',
            'configurator_price' => 'required|numeric',
            'in_stock' => 'required|bool',
            'img' => 'image|nullable',
            'description' => 'string|max:500|nullable',
            'category_id' => 'required|integer',
            'product_type_id' => 'required|integer',
            'specification_values.*' => 'required|array|required_array_keys:specification_id,value',
            'configurator' => 'nullable|array',
            'configurator.*' => 'int|exists:product_types,id',
            'configurator.*.*' => 'int|exists:products,id'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
