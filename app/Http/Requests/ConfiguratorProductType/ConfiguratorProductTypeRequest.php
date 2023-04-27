<?php

namespace App\Http\Requests\ConfiguratorProductType;

use Illuminate\Foundation\Http\FormRequest;

class ConfiguratorProductTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'configurator_id' => ['required', 'integer'],
            'product_type_id' => ['required', 'exists:product_types'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
