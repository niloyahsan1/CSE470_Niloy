<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fname' => ['required', 'string', 'max:50'],
            'lname' => ['nullable', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:50', 'unique:signup_table,email'],
            'ptype' => ['required', 'string', 'in:Customer,Consultant'],
            'pass' => ['required', 'string', 'min:6'],
        ];
    }
}
