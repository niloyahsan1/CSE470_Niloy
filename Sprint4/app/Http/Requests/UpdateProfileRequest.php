<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'age' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'height' => ['required', 'numeric', 'min:1'],
            'current_weight' => ['required', 'numeric', 'min:1'],
        ];
    }
}
