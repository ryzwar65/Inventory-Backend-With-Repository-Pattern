<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;

class UserRequest extends FormRequest
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
            //
            "firstname" => "required",
            "lastname" => "required",
            "email" => "required|unique:users,email",
            "password" => $this->method() == "POST" ? "required|min:8" : "min:8",
            "address" => "required",
            "phone" => "required|max:15",
        ];
    }

    public function messages()
    {
        return [
            "firstname.required" => "First Name is Required",
            "lastname.required" => "Last Name is Required",
            "email.required" => "Email is Required",
            "password.required" => "Password is Required",
            "address.required" => "Address is Required",
            "phone.required" => "Phone is Required",
            "phone.max" => "Phone Maximal 15 Digits",
            "password.max" => "Password Minimal 8 Digits",
            "email.unique" => "Email is Exist",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            [
                "message" => "Validation Error",
                "error" => $validator->errors()
            ]
            ,422
        ));
    }
}
