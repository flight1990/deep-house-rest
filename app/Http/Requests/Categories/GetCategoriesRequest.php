<?php

namespace App\Http\Requests\Categories;

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
            'except' => ['sometimes', 'array'],
            'search' => ['sometimes', 'string'],
        ];
    }
}
