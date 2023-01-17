<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Admin\ProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class UserController extends Controller
{
    protected const ROLE = [
        'admin'=>'1',
        'user'=>'2',
        'manager'=>'3'
    ];
    public function showLoginForm(){
        return view('auth.login');
    }
    public function login(LoginRequest $request){
        $validated = $request->validated();
        $user = ['email'=>$validated['email'], 'password'=>$validated['password']];
        if(Auth::attempt($user)){
            return redirect()->route('profile')->with(['message'=>'Login success']);
        }else{
            return view('auth.login');
        }

    }
    public function showRegisterForm(){
        return view('auth.register');
    }
    public function register(RegisterRequest $request){
        $validated = $request->validated();
        $userNew = [
            'email'=>$validated['email'],
            'password'=>Hash::make($validated['password']),
            'first_name'=>$validated['first_name'],
            'last_name'=>$validated['last_name'],
            'gender'=>$validated['gender'],
            'address'=>$validated['address'],
            'role'=>self::ROLE['admin'],
        ];
        User::create($userNew);
        return redirect()->route('login.form')->with(['message'=>'register success']);
    }
    public function showProfile(){
        return view('admin.profile');
    }
    public function showEditForm(){
        return view('admin.edit');
    }
    public function editProfile(ProfileRequest $request){
        $validated = $request->validated();
        $userUpdate = [
            'email'=>$validated['email'],
            'first_name'=>$validated['first_name'],
            'last_name'=>$validated['last_name'],
            'birth_day'=>$validated['birth_day'],
            'gender'=>$validated['gender'],
            'address'=>$request['address'],
            'avatar'=>$request['avatar']
        ];
        User::where('user_id',Auth::user()->user_id)->update($userUpdate);
        return redirect()->route('profile');
    }
}
