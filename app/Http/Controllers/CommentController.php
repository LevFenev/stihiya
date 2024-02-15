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
        return view('comment.trashed', ['comment'=>$comments]);
    }

    public function restoreComment(string $id) {
        $toBeRestoredComment = Comment::withTrashed()->where('id',$id)->get(); //он даёт удалённые комментарии в виде массива
        $poem_id = $toBeRestoredComment[0]->poem_id; // 0 потому что массив
        $comments = Comment::where('id',$id)->restore(); // restore даёт кол-во id
        return redirect()->route('/poems', ['id'=>$poem_id]); // вернет на стих с которого удалили коммент
    }

    public function postComment(string $poem_id) {
        // как-то нужно написать что здесь остаётся коммент
        return redirect()->route('poems', ['id'=>2]); // вернет на стих с которого удалили коммент
    }
}
