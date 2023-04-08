<?php

namespace App\Http\Requests\Admin\Configurator;

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
