<?php

namespace App\Http\Requests\Media;

use Illuminate\Foundation\Http\FormRequest;

class GetMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'in' => ['sometimes', 'array'],
            'page' => ['sometimes', 'integer', 'min:1'],
            'limit' => ['sometimes', 'integer', 'min:1', 'max:200']
        ];
    }
}
