<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'bail|required|email|unique:dt_users|max:255',
            'user_name' => 'bail|required|unique:dt_users|max:255',
            'password' => 'required|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'email.unique' => 'Email, username or passward is invalid',
            'user_name.required' => 'Username is required',
            'user_name.unique' => 'Email, username or passward is invalid',
            'password.required'  => 'Password is required',
        ];
    }    
}
