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
        $comments = Comment::onlyTrashed()->get();
        return view('comments.trashed', ['comments'=>$comments]);
    }

    public function restoreComment(string $id) {
        $poem_id = Comment::where('id',$id)->get();
        $comments = Comment::where('id',$id)->restore(); // restore даёт кол-во id
        return view('poems.read');
    }
}
