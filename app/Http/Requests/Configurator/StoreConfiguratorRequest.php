<?php

namespace App\Http\Requests\Configurator;

use Illuminate\Foundation\Http\FormRequest;

class StoreConfiguratorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:products,id'
        ];
    }
}
