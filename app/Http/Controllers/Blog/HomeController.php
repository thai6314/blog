<?php

namespace App\Http\Controllers\Blog;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function showHomeUser(){
        $postsOfDay = Post::whereDate('created_at', '=', Carbon::today()->toDateString())->get();
        $categories = Category::all();
        return view('user.home', [
            'categories'=>$categories,
            'posts'=>$postsOfDay,
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
