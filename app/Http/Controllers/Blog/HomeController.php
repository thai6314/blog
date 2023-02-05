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
        $postsOld = Post::whereDate('created_at', '!=', Carbon::today()->toDateString())->get();
        $categories = Category::all();
        return view('user.home', [
            'categories'=>$categories,
            'posts_of_day'=>$postsOfDay,
            'posts_old'=>$postsOld,
            'posts'=>$postsOfDay,
        ]);

    }
    public function showListPostsByCategoryID($category_id){
        $categories = Category::all();
        $postsOfDay = Post::where('category_id', $category_id)->whereDate('created_at', '=', Carbon::today()->toDateString())->get();
        $postsOld = Post::where('category_id', $category_id)->whereDate('created_at', '!=', Carbon::today()->toDateString())->get();
        return view('user.home', [
            'categories'=>$categories,
            'posts_of_day'=>$postsOfDay,
            'posts_old'=>$postsOld,
            'category_id'=>$category_id,
        ]);
    }
}
