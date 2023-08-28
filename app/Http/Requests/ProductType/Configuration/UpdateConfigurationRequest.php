<?php

namespace App\Http\Requests\ProductType\Configuration;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConfigurationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'configuration_product_type_id' => ['integer', 'exists:product_types,id'],
            'max_count' => ['integer'],
            'quantity_of_divided_item' => ['integer'],
            'is_divided' => ['boolean'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
