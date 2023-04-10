<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'products' => ['required', 'json'],
            'comment' => ['nullable','string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
