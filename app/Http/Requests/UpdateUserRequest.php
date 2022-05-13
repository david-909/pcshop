<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            "newName" => "required|string|min:3",
            "newSurname" => "required|string|min:3",
            "newEmail" => "required|email|unique:users,email",
            "newUsername" => "required",
            "newPassword" => "required|min:5",
            "newPasswordRepeat" => "required|same:newPassword",
            "newPhone" => "required",
            "newAddress" => "required",
            "newCity" => "required|numeric|min:1"
        ];
    }
}
