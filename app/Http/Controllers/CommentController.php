<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    // по идее должно располагаться в comment controller
    public function deleteComment(string $id) {
        $comments = Comment::where('id',$id)->delete();
        return view('comments.delete', ['comments'=>$comments]);
    }

    public function showTrashedComments() {
        $comments = Comment::withTrashed()->get();
        return view('comments.trashed', ['comments'=>$comments]);
    }

    public function restoreComment(string $id) {
        $comments = Comment::where('id',$id)->restore();
        return view('comments.restore', ['comments'=>$comments]);
    }
}
