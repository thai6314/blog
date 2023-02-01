<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email'=>'required|min:10|max:100|unique:user',
            'password'=>'required|min:6|max:100',
            'confirm_password'=>'required|min:6|max:100|same:password',
            'first_name'=>'required|max:50',
            'last_name'=> 'required|max:50',
            'gender'=>'required',
            'address'=>'required'
        ];
    }

}
