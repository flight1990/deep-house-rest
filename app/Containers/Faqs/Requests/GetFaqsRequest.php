<?php

namespace App\Containers\Faqs\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetFaqsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search' => ['sometimes', 'string'],
        ];
    }
}
