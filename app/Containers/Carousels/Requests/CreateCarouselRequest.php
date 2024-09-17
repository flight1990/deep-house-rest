<?php

namespace App\Containers\Carousels\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCarouselRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:65000'],
            'link' => ['nullable', 'url', 'max:255'],
            'alt' => ['nullable', 'string', 'max:255'],
            'photo_id' => ['required', 'integer', 'exists:media,id']
        ];
    }
}
