<?php

namespace App\Http\Requests\Category;

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
            'name' => 'required|max:255|string',
            'parent_id' => 'integer|nullable',
            'img' => 'image|nullable',
            'isActive' => 'boolean|required',
            'position' => 'integer|nullable'
        ];
    }


}
