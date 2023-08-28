<?php

namespace App\Http\Requests\ProductType\Specification;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpecificationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'is_active' => 'required|boolean',
            'position' => "required|integer"
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
