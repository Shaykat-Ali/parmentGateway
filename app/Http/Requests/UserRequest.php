<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'user_type' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$this->id
        ];

        if($this->method() != 'PATCH'){
            $rules['password'] = 'required|min:6';
            $rules['confirm_password'] = 'required_with:password|same:password';
        }

        return $rules;
    }
}
