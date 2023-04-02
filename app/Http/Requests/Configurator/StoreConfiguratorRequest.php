<?php

namespace App\Http\Requests\Configurator;

use Illuminate\Foundation\Http\FormRequest;

class StoreConfiguratorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
