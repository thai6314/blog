<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(Request $request){
        $commentNew = [
            'user_id'=>$request['user_id'],
            'post_id'=>$request['post_id'],
            'parent_id'=>$request['parent_id'],
            'comment'=>$request['comment']
        ];
        Comment::create($commentNew);
        return response()->json([
            'status' => 200,
        ]);

    }
    public function getListComment($post_id){
        $comments = Comment::where('post_id', $post_id)->orderBy('created_at', 'asc')->get();
        $commentsParentAndChild = array();
        for($i=0; $i< count($comments); $i++){
            $commentsChild = array();
            for($j=0; $j< count($comments); $j++){
                if($comments[$i]->comment_id == $comments[$j]->parent_id){
                    $user = User::where('user_id', $comments[$j]->user_id)->first();
                    array_push($commentsChild,
                        ['comment_id'=>$comments[$j]->comment_id,
                        'parent_id'=>$comments[$j]->parent_id,
                        'comment'=>$comments[$j]->comment,
                        'user'=>$user]
                    );
                }
            }
            $user = User::where('user_id', $comments[$i]->user_id)->first();
            if($commentsChild != null) {
                array_push($commentsParentAndChild,
                    [
                        'comment' => [
                            'comment_id'=>$comments[$i]->comment_id,
                            'parent_id'=>$comments[$i]->parent_id,
                            'comment'=>$comments[$i]->comment,
                            'user'=>$user,
                            'comments_child' => array_values($commentsChild),

                        ]
                    ]);
            }else {
                array_push($commentsParentAndChild, [
                    'comment'=>[
                        'comment_id'=>$comments[$i]->comment_id,
                        'parent_id'=>$comments[$i]->parent_id,
                        'comment'=>$comments[$i]->comment,
                        'user'=>$user
                    ]
                ]);
            }
        }
        $commentsParentAndChild = array_filter($commentsParentAndChild, function ($comment) {
            if (isset($comment['comment']['parent_id'])) {
                return $comment['comment']['parent_id'] == null;
            } else {
                return true;
            }
        });

        return response()->json([
            'status' => 200,
            'data'=> array_values($commentsParentAndChild)
        ]);
    }

    public function getListCommentForAdmin(){
        $comments = Comment::all();
        $commetsInfo = array();
        foreach ($comments as $comment){
            $post = Post::where('post_id', $comment->post_id)->first();
            $user = User::where('user_id', $comment->user_id)->first();
            array_push($commetsInfo, [
                'comment_id'=>$comment->comment_id,
                'comment'=>$comment->comment,
                'status'=>$comment->status,
                'comment_time'=>$comment->created_at,
                'user'=>$user,
                'post'=>$post,

            ]);
        }
        return view('post.list_comment', ['comments'=>$commetsInfo]);
    }

    public function activeComment(Request $request){
        $comment_id = $request['comment_id'];
        Comment::where('comment_id', $comment_id)->update(['status'=> 1]);
        return \response()->json([
            'status'=>200,
        ]);
    }
}
