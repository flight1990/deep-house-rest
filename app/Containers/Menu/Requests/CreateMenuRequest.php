<?php

namespace App\Containers\Menu\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMenuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:255'],
            'parent_id' => ['nullable', 'integer', 'exists:menu,id']
        ];
    }
}
