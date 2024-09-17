<?php

namespace App\Containers\Reviews\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'message' => ['required', 'max:65000'],
            'name' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'max:255'],
            'email' => ['nullable', 'max:255', 'email'],
            'product_id' => ['nullable', 'integer', 'exists:products,id'],
            'user_id' => ['nullable', 'integer', 'exists:users,id'],
            'is_active' => ['sometimes', 'boolean']
        ];
    }
}
