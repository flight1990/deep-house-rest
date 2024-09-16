<?php

namespace App\Http\Requests\Carousels;

use Illuminate\Foundation\Http\FormRequest;

class GetCarouselsRequest extends FormRequest
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
