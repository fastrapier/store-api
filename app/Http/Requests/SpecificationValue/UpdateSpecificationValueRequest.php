<?php

namespace App\Http\Requests\SpecificationValue;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSpecificationValueRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'value' => 'string|max:255',
            'specification_id' => 'integer',
            'product_id' => 'integer'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
