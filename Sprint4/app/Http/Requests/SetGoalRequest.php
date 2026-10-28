<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetGoalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'weight' => ['required', 'string', 'in:Increase,Decrease'],
        ];
    }
}
