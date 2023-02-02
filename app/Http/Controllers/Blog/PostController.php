<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function showListPost(){
        $posts = Post::all();
        $postsInfo = array();
        foreach ($posts as $post){
            $user = User::where('user_id', $post->user_id)->first();
            $category = Category::where('category_id', $post->category_id)->first();
            array_push($postsInfo, [
                'post_id'=>$post->post_id,
                'title'=>$post->title,
                'photo'=>$post->photo,
                'content'=>$post->content,
                'post_time'=>$post->created_at,
                'user'=>$user,
                'category'=>$category,
            ]);
        }
        return view('post.list_post',['posts'=>array_values($postsInfo)]);

    }
    public function showAddPostForm(){
        $categories = Category::all();
        return view('post.add_post', ['categories'=>$categories]);
    }
    public function addPost(Request $request){
        $validated = $request->validate([
            'title' => 'required|max:200',
            'content'=> 'required',
        ]);
        $postNew = [
            'title'=>$validated['title'],
            'photo'=>$request['photo'],
            'content'=>$validated['content'],
            'user_id'=>Auth::user()->user_id,
            'category_id'=>$request['category_id'],
        ];
        Post::create($postNew);
        return redirect()->route('list.post')->with(['message'=>'Add post success']);
    }
    public function showUpdatePostForm($post_id){
        $post = Post::where('post_id', $post_id)->first();
        return view('post.update_post',['post'=>$post]);
    }
    public function updatePost(Request $request){
        $validated = $request->validate([
            'title' => 'required|max:200',
            'content'=> 'required',
        ]);
        $postUpdate = [
            'title'=>$validated['title'],
            'photo'=>$request['photo'],
            'content'=>$validated['content'],
        ];
        Post::where('post_id', $request['post_id'])->update($postUpdate);
        return redirect()->route('list.post')->with(['message'=>'Update post success']);
    }
    public function deletePost($post_id){
        $post = Post::find($post_id);
        if($post == null){
            return redirect()->route('list.post')->with(['message'=>'Delete failed']);
        }else{
            $post -> delete();
            return redirect()->route('list.post')->with(['message'=>'Deleted']);
        }
    }
    public function getDetail($post_id){
        $categories = Category::all();
        $post = Post::where('post_id', $post_id)->first();
        return view('post.detail', [
            'post'=>$post,
            'categories'=>$categories
        ]);
    }
}
