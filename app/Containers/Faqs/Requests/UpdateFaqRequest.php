<?php

namespace App\Containers\Faqs\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFaqRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question' => ['sometimes', 'string', 'max:255'],
            'answer' => ['sometimes', 'string', 'max:65000'],
        ];
    }
}
