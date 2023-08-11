<?php

namespace App\Http\Requests\ProductType\Configuration;

use Illuminate\Foundation\Http\FormRequest;

class StoreConfigurationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'configuration_product_type_id' => ['required', 'integer', 'exists:product_types,id'],
            'max_count' => 'required|integer',
            'quantity_of_divided_item' => 'required|integer',
            'is_divided' => 'required|boolean'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
