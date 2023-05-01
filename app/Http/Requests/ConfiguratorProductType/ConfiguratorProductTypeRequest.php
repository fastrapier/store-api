<?php

namespace App\Http\Requests\ConfiguratorProductType;

use Illuminate\Foundation\Http\FormRequest;

class ConfiguratorProductTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'configurator_id' => ['required', 'integer'],
            'product_type_id' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
