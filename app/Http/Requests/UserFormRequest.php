<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Adjust this based on your application's authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|numeric',
            'fname' => 'required|alpha',
            'lname' => 'required|alpha',
            'password' => [
                'required',
                'string',
                'min:10', // Minimum of 10 characters
                'regex:/[A-Z]/', // Must contain at least one uppercase letter
                'regex:/[0-9]/', // Must contain at least one number
            ],
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'phone_number.required' => 'The phone number field is required.',
            'phone_number.numeric' => 'The phone number must be a valid number.',
            'fname.required' => 'The first name field is required.',
            'fname.alpha' => 'The first name must only contain letters.',
            'lname.required' => 'The last name field is required.',
            'lname.alpha' => 'The last name must only contain letters.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 10 characters long.',
            'password.regex' => 'The password must contain at least one uppercase letter and one number.',
        ];
    }
}
