<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSignUpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    /*public function authorize(): bool
    {
        return false;
    }*/

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fname' => 'required|min:3|alpha',
            'lname' => 'required',
            'gender'=> 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'phonenumber' => 'required|numeric|min:10'
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'fname.required' => 'Please enter first name',
            'fname.min' => 'First name should have atleast 3 characters',
            'fname.alpha' => 'First name should only have alphabets',
            'lname.required' => 'Please enter Last Name',
            'gender.required' => 'Please select gender',
            'password.required' => 'Please type password',
            'password.min' => 'Password Should have Atleast 8 characters',
            'phonenumber.required' => 'Please enter phone Number',
            'phonenumber.numeric' => 'Phone Number should only have Numbers',
            'phonenumber.min' => 'Phone Number should have 10 Numbers',
            'email.required' => 'Please Enter Email',
            'email.email' => 'Please Enter valid Mail'
        ];
    }
}
