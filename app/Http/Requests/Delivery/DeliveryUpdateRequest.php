<?php

namespace App\Http\Requests\Delivery;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryUpdateRequest extends FormRequest
{
    public function rules(): array
    {

        return [
            'name' => 'string',
            'description' => 'nullable',
            'cost' => 'numeric',
            'categories' => 'required_with:categories_price|array',
            'categories.*' => 'integer',
            'categories_price' => 'required_with:categories|numeric',
            'position' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
