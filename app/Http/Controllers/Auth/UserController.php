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
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected const ROLE = [
        'admin'=>'1',
        'user'=>'2',
        'manager'=>'3'
    ];
    public function showLoginForm(){
        return view('auth.admin.login');
    }
    public function login(LoginRequest $request){
        $validated = $request->validated();
        $admin = ['email'=>$validated['email'], 'password'=>$validated['password'], 'role'=>self::ROLE['admin']];
        if (Auth::attempt($admin)) {
            return redirect()->route('profile.admin')->with(['message'=>'Login success']);
        }
        else {
            return redirect()->route('login.admin.form')->with(['message' => 'Email or password are not correct']);
        }
    }
    public function logout(Request $request){
        $currentUser = Auth::user();

        if($currentUser->role == self::ROLE['admin']) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login.admin.form');
        }
        else {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login.user.form');
        }
    }

    public function showRegisterForm(){
        return view('auth.admin.register');
    }
    public function registerAdmin(RegisterRequest $request){
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
    public function showLoginUserForm(){
        return view('auth.user.login');
    }
    public function loginUser(LoginRequest $request){
        $validated = $request->validated();
        $user = ['email'=>$validated['email'], 'password'=>$validated['password'], 'role'=>self::ROLE['user']];

        if (Auth::attempt($user)) {
            return redirect()->route('home.user')->with(['message'=>'Login success']);
        }
        else{
            return redirect()->route('login.user.form')->with(['message' => 'Email or password are not correct']);
        }
    }

    public function showRegisterUserForm(){
        return view('auth.user.register');
    }
    public function registerUser(RegisterRequest $request){
        $validated = $request->validated();
        $userNew = [
            'email'=>$validated['email'],
            'password'=>Hash::make($validated['password']),
            'first_name'=>$validated['first_name'],
            'last_name'=>$validated['last_name'],
            'gender'=>$validated['gender'],
            'address'=>$validated['address'],
            'role'=>self::ROLE['user'],
        ];
        User::create($userNew);
        return redirect()->route('login.user.form')->with(['message'=>'register success']);
    }
    public function showProfile(){
        if(Auth::user()->role == self::ROLE['admin']) {
            return view('admin.profile');
        } else {
            return view('user.profile');
        }
    }
    public function showEditForm(){
        if(Auth::user()->role == self::ROLE['admin']) {
            return view('admin.edit');
        } else {
            return view('user.edit_profile');
        }
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
        if(Auth::user()->role == self::ROLE['admin']){
            return redirect()->route('profile.admin');
        } else {
            return redirect()->route('profile.user');
        }

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
