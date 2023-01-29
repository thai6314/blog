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
        dd($request);
//        Comment::create($request->all());
//        return response()->json([
//            'status' => 200,
//        ]);

    }
    public function getListComment($post_id){
        $comments = Comment::where('post_id', $post_id)->orderBy('created_at', 'desc')->get();
        $data = array();
//        array_push($data, ['post_id'=>$post_id]);
        foreach ($comments as $comment){
            $user = User::where('user_id', $comment->user_id)->first();
            $comment_info = [
                'comment_is'=>$comment->comment_id,
                'parent_id'=>$comment->parent_id,
                'comment'=>$comment->comment,
                'post_id'=>$post_id,
                'user'=> $user
            ];
            array_push($data, $comment_info);
        }
        return response()->json([
            'status' => 200,
            'data'=> $data
        ]);
    }
}
