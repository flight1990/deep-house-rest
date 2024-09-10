<?php

namespace App\Http\Requests\Reviews;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'string', 'max:255'],
            'message' => ['sometimes', 'max:65000'],
            'name' => ['sometimes', 'string', 'max:255'],
            'phone' => ['sometimes', 'max:255'],
            'email' => ['sometimes', 'max:255', 'email'],
            'product_id' => ['sometimes', 'integer', 'exists:products,id'],
            'user_id' => ['sometimes', 'integer', 'exists:users,id'],
            'is_active' => ['sometimes', 'boolean']
        ];
    }
}
