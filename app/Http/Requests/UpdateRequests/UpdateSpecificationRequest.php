<?php

namespace App\Http\Requests\UpdateRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSpecificationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'max:255',
            'product_type_id' => 'integer'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
