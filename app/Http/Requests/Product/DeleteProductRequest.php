<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class DeleteProductRequest extends FormRequest
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
