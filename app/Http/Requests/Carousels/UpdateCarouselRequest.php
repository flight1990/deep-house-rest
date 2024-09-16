<?php

namespace App\Http\Requests\Carousels;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarouselRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'description' => ['sometimes', 'string', 'max:65000'],
            'link' => ['sometimes', 'url', 'max:255'],
            'alt' => ['sometimes', 'string', 'max:255'],
            'photo_id' => ['sometimes', 'integer', 'exists:media,id']
        ];
    }
}
