<?php

namespace App\Http\Requests\Client\Category;

use Illuminate\Foundation\Http\FormRequest;

class ShowCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'page' => 'int',
            'perPage' => 'int'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
