<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'email' => 'required|max:100|unique:user',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'birth_day' => 'required',
        ];
    }
}
