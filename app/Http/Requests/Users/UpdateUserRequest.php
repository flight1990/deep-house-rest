<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'max:255', 'email', 'unique:users,email,'.$this['user']],
            'password' => ['sometimes', 'max:255', 'string', 'confirmed']
        ];
    }
}
