<?php

namespace App\Containers\Products\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'description' => ['sometimes', 'max:65000'],
            'price' => ['sometimes', 'numeric'],
            'category_id' => ['sometimes', 'integer', 'exists:categories,id']
        ];
    }
}
