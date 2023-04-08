<?php

namespace App\Http\Requests\Admin\Configurator;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConfiguratorRequest extends FormRequest
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
