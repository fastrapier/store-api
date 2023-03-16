<?php

namespace App\Http\Requests\StoreRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255|string|unique:categories',
            'parent_id' => 'integer|nullable',
            'description' => 'string|max:500|nullable'
        ];
    }


}
