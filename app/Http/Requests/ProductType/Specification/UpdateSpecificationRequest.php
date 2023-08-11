<?php

namespace App\Http\Requests\ProductType\Specification;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSpecificationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'max:255',
            'product_type_id' => 'integer',
             'position' => 'integer',
            'is_active' => 'boolean'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
