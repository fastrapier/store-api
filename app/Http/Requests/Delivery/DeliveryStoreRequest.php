<?php

namespace App\Http\Requests\Delivery;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'nullable',
            'cost' => 'required|numeric',
            'position' => 'nullable|integer',
            'is_active' => 'required|boolean',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
