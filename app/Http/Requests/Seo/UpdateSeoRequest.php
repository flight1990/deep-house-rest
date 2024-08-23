<?php

namespace App\Http\Requests\Seo;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSeoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'url' => ['sometimes', 'url', 'max:255', 'unique:seo,url,'.$this['id']],
            'title' => ['sometimes', 'string', 'max:255'],
            'description' => ['sometimes', 'max:65000'],
            'keywords' => ['sometimes', 'max:65000'],
            'index' => ['sometimes', 'boolean'],
            'follow' => ['sometimes', 'boolean'],
        ];
    }
}
