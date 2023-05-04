<?php

namespace App\Http\Requests\ConfiguratorProduct;

use Illuminate\Foundation\Http\FormRequest;

class DeleteConfiguratorProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'configurator_product_type_id' => "required|integer|exists:configurator_product_types,id",
            'product_id' => 'required|exists:products,id',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
