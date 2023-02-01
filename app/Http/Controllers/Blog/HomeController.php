<?php

namespace App\Http\Controllers\Blog;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function showHomeUser(){

        $categories = Category::all();
        $posts = Post::where('category_id',$categories[0]->category_id)->get();
        return view('user.home', [
            'categories'=>$categories,
            'posts'=>$posts,
            'category_id'=>$categories[0]->category_id
        ]);
    }
    public function showListPostsByCategoryID($category_id){
        $categories = Category::all();
        $posts = Post::where('category_id', $category_id)->get();
        return view('user.home', [
            'categories'=>$categories,
            'posts'=>$posts,
            'category_id'=>$category_id,
        ]);
    }
}
