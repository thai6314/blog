<?php

namespace App\Http\Controllers\Blog;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function showHomeUser(){
        $categories = Category::all();
        $posts = Post::where('category_id',$categories[0]->category_id)->get();
        return view('user.categories', [
            'categories'=>$categories,
            'posts'=>$posts
        ]);
    }
    public function showListPostsByCategoryID($category_id){
        $categories = Category::all();
        $posts = Post::where('category_id', $category_id)->get();
        return view('user.categories', [
            'categories'=>$categories,
            'posts'=>$posts
        ]);
    }
}
