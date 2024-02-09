<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    // по идее должно располагаться в comment controller
    public function deleteComment(string $id) {
        $comments = Comment::where('comment_id',$id)->delete();
        return view('comment.delete', ['comments'=>$comments]);
    }
}
