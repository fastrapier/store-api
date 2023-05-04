<?php

namespace App\Http\Requests\ConfiguratorProduct;

use Illuminate\Foundation\Http\FormRequest;

class StoreConfiguratorProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'configurator_product_type_id' => 'required|integer',
            'product_id' => 'required|int|exists:products,id',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
