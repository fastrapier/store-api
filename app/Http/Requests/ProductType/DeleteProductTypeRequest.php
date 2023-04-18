<?php

namespace App\Http\Requests\ProductType;

use Illuminate\Foundation\Http\FormRequest;

class DeleteProductTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'ids' => "array|required",
            'ids.*' => "int"
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
