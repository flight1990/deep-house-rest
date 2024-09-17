<?php

namespace App\Containers\Categories\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetCategoriesRequest extends FormRequest
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
