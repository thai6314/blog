<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Comment;
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
            'comment'=>$request['comment']
        ];
        Comment::create($commentNew);
        return response()->json([
            'status' => 200,
        ]);

    }
    public function getListComment($post_id){
        $comments = Comment::where('post_id', $post_id)->orderBy('created_at', 'asc')->get()->toArray();
        $commentsParentAndChild = array();
        for($i=0; $i< count($comments); $i++){
            $commentsChild = array();
            for($j=0; $j< count($comments); $j++){
                if($comments[$i]['comment_id'] == $comments[$j]['parent_id']){
                    $user = User::where('user_id', $comments[$j]['user_id'])->first();
                    array_push($commentsChild,
                        ['comment_id'=>$comments[$j]['comment_id'],
                        'parent_id'=>$comments[$j]['comment_id'],
                        'comment'=>$comments[$j]['comment'],
                        'user'=>$user]
                    );
                }
            }
            if($commentsChild != null) {
                array_push($commentsParentAndChild,
                    [
                        'comment' => [
                            'comment_parent' => $comments[$i],
                            'comments_child' => $commentsChild
                        ]
                    ]);
            }else {
                array_push($commentsParentAndChild, ['comment'=>$comments[$i]]);
            }
        }
        $comment_arr = array_filter($commentsParentAndChild, function ($comment) {
            if (isset($comment['comment']['parent_id'])) {
                return $comment['comment']['parent_id'] == null;
            } else {
                return true;
            }
        });
        return response()->json([
            'status' => 200,
            'data'=> $comment_arr
        ]);
    }

}
