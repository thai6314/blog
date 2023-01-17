<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', [UserController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::get('profile', [UserController::class, 'showProfile'])->name('profile');
Route::get('edit', [UserController::class, 'showEditForm'])->name('edit.form');
Route::post('edit', [UserController::class, 'editProfile'])->name('edit.profile');

Route::get('register', [UserController::class, 'showRegisterForm'])->name('register.form');
Route::post('register', [UserController::class, 'register'])->name('register');

