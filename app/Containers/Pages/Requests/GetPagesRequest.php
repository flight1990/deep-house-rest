<?php

namespace App\Containers\Pages\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetPagesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search' => ['sometimes', 'string'],
            'page' => ['sometimes', 'integer', 'min:1'],
            'limit' => ['sometimes', 'integer', 'min:1', 'max:200']
        ];
    }
}
