<?php

namespace App\Http\Requests\Admin\Product;

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
            'description' => 'string|max:500',
            'category_id' => 'required|integer',
            'product_type_id' => 'required|integer',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
