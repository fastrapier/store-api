<?php

namespace App\Http\Requests\Specification;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpecificationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'product_type_id' => 'required|integer',
//            'position' => 'nullable|integer',
//            'is_active' => 'nullable|boolean'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
