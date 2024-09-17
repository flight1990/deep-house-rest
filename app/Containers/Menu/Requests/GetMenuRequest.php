<?php

namespace App\Containers\Menu\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetMenuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'notIn' => ['sometimes', 'array'],
            'search' => ['sometimes', 'string'],
        ];
    }
}
