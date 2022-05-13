<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            "name"=>"required|string|min:3",
            "surname"=>"required|string|min:3",
            "email"=>"required|email|unique:users,email",
            "username"=>"required",
            "password" => "required|min:5",
            "confirmPassword" => "required|same:password",
            "phone" => "required",
            "address" => "required",
            "city" => "required|numeric|min:1"
        ];
    }

    public function messages()
    {
        return [
            "name.required"=>"You need to enter your name",
            "surname.required"=>"You need to enter your surname",
            "email.required"=>"You need to enter your email address",
            "username.required"=>"You need to enter your username",
            "password.required" => "You need to enter your password",
            "confirmPassword.same" => "Password must match",
            "confirmPassword.required" => "You need to re-enter your password",
            "phone.required" => "You need to enter your phone",
            "address.required" => "You need to enter your address",
            "city.min" => "You need to enter your city"
        ];
    }
}
