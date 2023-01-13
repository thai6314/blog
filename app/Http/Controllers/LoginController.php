<?php

namespace App\Http\Controllers;

class LoginController
{
    public function showFormLogin(){
        return view('auth.login');
    }
}
