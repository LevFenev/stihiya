<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class CommentController extends Controller
{
    public function deleteComment(string $id) {
        // $comments = Comment::where('id',$id)->delete(); // кол-во удалённых комментариев // ОСТАНОВИЛСЯ ТУТ - ПОМЕНЯТЬ ТО ЧТО НАДО ПОМЕНЯТЬ
        $deletedComments = Comment::onlyTrashed()->where('id',$id)->get();
        $poem_id = $deletedComments[0]->poem_id; // ошибка здесь
        $comments = Comment::where('id',$id)->delete();
        return redirect()->route('poems', ['id'=>$poem_id]);
    }

    public function showTrashedComments() {
        $comments = Comment::onlyTrashed()->get();
        return view('comment.trashed', ['comments'=>$comments]);
    }

    public function restoreComment(string $id) {
        $toBeRestoredComment = Comment::withTrashed()->where('id',$id)->get(); //он даёт удалённые комментарии в виде массива
        $poem_id = $toBeRestoredComment[0]->poem_id; // 0 потому что массив
        $comments = Comment::where('id',$id)->restore(); // restore даёт кол-во id
        return redirect()->route('poems/{$poem_id}'); // вернет на стих с которого удалили коммент
    }

    public function getComment(string $poem_id) {
        return view('comment.form', ['poem_id'=>$poem_id]); // вернет на стих с которого удалили коммент
    }

    public function postComment(Request $request) {
        $validated = $request->validate([
            'comment_body'=>['required', 'max:50', 'min:5'],
            'poem_id'=>['numeric', 'exists:poem,id']
        ]);
        $validated = $request->all();
        $comment = new Comment();
        $comment->content=$validated['comment_body'];
        $comment->user_id=2;
        $comment->poem_id=$validated['poem_id'];
        $comment->save();
        return view('comment.added', ['request'=>$request]); // вернет на стих с которого удалили коммент
    }
}
