<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

  
    public function rules(): array
    {
        return [
            'email'    => 'required|exists:users,email',
            'password' => 'required',
        ];
    }


    public function messages(): array
    {
        return [
            'email.required' => 'Email field is required.',
            'email.exists'   => 'No account found with this email.',
            'password.required' => 'Password field is required.',
        ];
    }
}
