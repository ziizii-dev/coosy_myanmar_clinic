<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|string",
            "email" => "required|string",
            "phone" => "nullable",
            "address" => "nullable",
            "photo" => "mimes:jpeg,png,jpg",
            
           
        ];
    }
    public function messages()
    {
        return [
            'password_confirmation.required_with' => 'The password confirmation field is required',
            'password'=>"password field is required",
            'password_confirmation.same' => 'The password confirmation does not match.',
        ];
    }
    // protected function prepareForValidation()
    // {
    //     $this->merge([
    //         'password' => Hash::make($this->password),
    //         'password_confirmation' => Hash::make($this->password_confirmation),
    //     ]);
    // }
}
