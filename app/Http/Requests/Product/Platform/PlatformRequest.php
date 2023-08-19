<?php

namespace App\Http\Requests\Product\Platform;

use Illuminate\Foundation\Http\FormRequest;

class PlatformRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'platform' => 'required|array',
            'platform.*' => 'required|array',
            'platform.*.configuration_id' => "exists:configurations,id|required|integer",
            'platform.*.selected_product_id' => "exists:products,id|required|integer"
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
