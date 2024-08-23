<?php

namespace App\Http\Requests\Seo;

use Illuminate\Foundation\Http\FormRequest;

class CreateSeoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'url' => ['required', 'url', 'max:255', 'unique:seo,url'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'max:65000'],
            'keywords' => ['nullable', 'max:65000'],
            'index' => ['nullable', 'boolean'],
            'follow' => ['nullable', 'boolean'],
        ];
    }
}
