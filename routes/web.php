<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\UserController;
use \App\Http\Controllers\Blog\CategoryController;
use \App\Http\Controllers\Blog\PostController;
use \App\Http\Controllers\Blog\HomeController;
use \App\Http\Controllers\Blog\CommentController;
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



Route::get('/',function (){
    return view('auth.user.login');
});
Route::get('logout',[UserController::class, 'logout'])->name('logout');

Route::prefix('user')->middleware('auth')->group(function(){
    Route::get('home', [HomeController::class, 'showHomeUser'])->name('home.user');
    Route::get('posts/{category_id}', [HomeController::class, 'showListPostsByCategoryID'])->name('list.posts');
    Route::post('posts/{category_id}',);

    Route::prefix('comment')->group(function (){

    });
    Route::prefix('post')->group(function (){
        Route::get('detail/{id}', [PostController::class, 'getDetail'])->name('detail.post');
        Route::get('list', [PostController::class, 'showListPost'])->name('list.post');
    });

});
Route::prefix('auth')->group(function(){
    Route::get('register_user',[UserController::class, 'showRegisterUserForm'])->name('register.user.form');
    Route::post('register_user', [UserController::class, 'registerUser'])->name('register.user');
    Route::get('login_user', [UserController::class, 'showLoginUserForm'])->name('login.user.form');
    Route::post('login_user', [UserController::class, 'loginUser'])->name('login.user');

    Route::get('login', [UserController::class, 'showLoginForm'])->name('login.admin.form');
    Route::post('login', [UserController::class, 'login'])->name('login.admin');
    Route::get('register', [UserController::class, 'showRegisterForm'])->name('register.admin.form');
    Route::post('register', [UserController::class, 'registerAdmin'])->name('register.admin');

});
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('profile', [UserController::class, 'showProfile'])->name('profile');
    Route::get('edit', [UserController::class, 'showEditForm'])->name('edit.form');
    Route::post('edit', [UserController::class, 'editProfile'])->name('edit.profile');

    Route::get('add_user', [UserController::class, 'showAddUserForm'])->name('add.user.form');
    Route::post('add_user', [UserController::class, 'addUser'])->name('add.user');
    Route::get('list_user', [UserController::class, 'showListUser'])->name('list.user');
    Route::get('update_user/{id}', [UserController::class, 'showUpdateUserForm'])->name('update.user.form');
    Route::post('update_user', [UserController::class, 'updateUser'])->name('update.user');
    Route::get('delete_user/{id}', [UserController::class, 'deleteUser'])->name('delete.user');

    Route::prefix('category')->group(function (){
        Route::get('list', [CategoryController::class, 'showListCategory'])->name('list.category');
        Route::get('add', [CategoryController::class, 'showAddCategoryForm'])->name('add.category.form');
        Route::post('add', [CategoryController::class, 'addCategory'])->name('add.category');
        Route::get('update/{id}', [CategoryController::class, 'showUpdateCategoryForm'])->name('update.category.form');
        Route::post('update', [CategoryController::class, 'updateCategory'])->name('update.category');
        Route::get('delete/{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');
    });

    Route::prefix('post')->group(function (){
        Route::get('list', [PostController::class, 'showListPost'])->name('list.post');
        Route::get('add', [PostController::class, 'showAddPostForm'])->name('add.post.form');
        Route::post('add', [PostController::class, 'addPost'])->name('add.post');
        Route::get('update/{id}', [PostController::class, 'showUpdatePostForm'])->name('update.post.form');
        Route::post('update', [PostController::class, 'updatePost'])->name('update.post');
        Route::get('delete/{id}', [PostController::class, 'deletePost'])->name('delete.post');
    });
});



