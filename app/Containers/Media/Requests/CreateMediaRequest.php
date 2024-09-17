<?php

namespace App\Containers\Media\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'file' => ['required', 'file', 'mimes:jpeg,png,jpg,gif']
        ];
    }
}
