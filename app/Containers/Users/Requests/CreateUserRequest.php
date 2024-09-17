<?php

namespace App\Containers\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users,email'],
            'password' => ['required', 'max:255', 'confirmed']
        ];
    }
}
