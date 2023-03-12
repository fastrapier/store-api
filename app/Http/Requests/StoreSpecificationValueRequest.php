<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpecificationValueRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'value' => 'required|string|max:255',
            'specification_id' => 'required|integer',
            'product_id' => 'required|integer'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
