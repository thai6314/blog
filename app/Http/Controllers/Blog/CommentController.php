<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(Request $request){
        Comment::create($request->all());
        return response()->json([
            'status' => 200,
        ]);

    }
    public function getListComment(){
        $post_id = 1;
        $comments = Comment::where('post_id', $post_id)->orderBy('created_at', 'desc')->get();
        $users = [];
        foreach ($comments as $comment){
            $user = User::where('user_id', $comments->user_id)->first();
            array_push($users, $user);
        }

        return response()->json([
            'status' => 200,
            'data'=>[
                '$comments'=>$comments,
                'users'=> $users
            ]
        ]);
    }
}
