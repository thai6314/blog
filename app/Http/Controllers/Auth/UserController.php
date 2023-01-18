<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Admin\ProfileRequest;
use App\Http\Requests\Admin\AddUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $user = ['email'=>$validated['email'], 'password'=>$validated['password'], 'role'=>self::ROLE['admin']];
        if(Auth::attempt($user)){
            return redirect()->route('profile')->with(['message'=>'Login success']);
        }else{
            return redirect()->route('login.form')->with(['message'=>'User can not login']);
        }

    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
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

    public function showAddUserForm(){
        return view('admin.add_user');
    }
    public function addUser(AddUserRequest $request){
        $validated = $request->validated();
        $userNew = [
            'email'=>$validated['email'],
            'password'=>Hash::make($validated['password']),
            'first_name'=>$validated['first_name'],
            'last_name'=>$validated['last_name'],
            'birth_day'=>$validated['birth_day'],
            'gender'=>$request['gender'],
            'address'=>$request['address'],
            'avatar'=>$request['avatar'],
            'role'=>$request['role'],
        ];
        User::create($userNew);
        return redirect()->route('list.user')->with(['message'=>'Add user success']);
    }
    public function showListUser(){
        $listUser = User::where('role', self::ROLE['user'])->where('status','1')->get();
        return view('admin.list_user',['users'=>$listUser]);
    }

    public function showUpdateUserForm($user_id){
        $user = User::where('user_id', $user_id)->first();
        return view('admin.update_user', ['user'=> $user]);
    }
    public function updateUser(UpdateUserRequest $request){
        $validated = $request->validated();
        $userUpdate = [
            'email'=>$validated['email'],
            'first_name'=>$validated['first_name'],
            'last_name'=>$validated['last_name'],
            'birth_day'=>$validated['birth_day'],
            'gender'=>$request['gender'],
            'address'=>$request['address'],
            'avatar'=>$request['avatar'],
            'role'=>$request['role'],
        ];
        User::where('user_id', $request['user_id'])->update($userUpdate);
        return redirect()->route('list.user')->with(['message'=>'Update user success']);
    }

    public function deleteUser($user_id){
       $user = User::find($user_id);
        if($user == null) {
            return redirect()->route('list.user')->with(['message' => 'User is not exist']);
        }else{
            User::where('user_id', $user_id)->update(['status'=>'0', 'deleted_at'=> date('Y-m-d H:i:s')]);
            return redirect()->route('list.user')->with(['message'=>'Deleted']);
        }
    }
}
