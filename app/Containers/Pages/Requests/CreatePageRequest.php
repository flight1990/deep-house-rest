<?php

namespace App\Containers\Pages\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'body' => ['required', 'max:65000']
        ];
    }
}
