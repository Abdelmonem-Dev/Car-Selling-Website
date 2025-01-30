<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:250|email',
            'password' => 'required|string|min:8',
        ];
    }
    public function messages(): array
{
    return [
        'email.required' => 'Email is required',
        'email.email' => 'Enter a valid email address',
        'email.exists' => 'The email address is not registered',
        'email.max' => 'Email is too long',
        'password.required' => 'Password is required',
        'password.min' => 'Password must be at least 8 characters long',
    ];
}
}
