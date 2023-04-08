<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'max:255|string|unique:categories',
            'parent_id' => 'integer|nullable',
            'description' => 'string|max:500|nullable'
        ];
    }
}
