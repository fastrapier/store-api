<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class DeleteCategoryRequest extends FormRequest
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
