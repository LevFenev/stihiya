<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Poem;
use App\Models\User;
use Illuminate\Http\Request;

class PoemController extends Controller // ВОТ ЗДЕСЬ ДВЕ ТАБЛИЦЫ
{
    public function showPoems() { //action контроллера
        $poems = Poem::all(); // all() уже показывает только не удаленные сущности
        return view('poem.list', ['poems'=>$poems]);
    }

    public function admin_showPoems() { //action контроллера
        $poems = Poem::all(); // all() уже показывает только не удаленные сущности
        return view('poem.admin_list', ['poems'=>$poems]);
    }

    public function readPoem(string $id) {
        $poems = Poem::where('id',$id)->get(); // данные записываются в переменную - скидывает полный объект

        $comments = [];

        $comments = Comment::where('poem_id',$id)->get();

        return view('poem.admin_read',['poems'=>$poems,'comments'=>$comments]); // переменная - poem // вот как тут несколько баз данных
    }

    public function admin_readPoem(string $id) {
        $poems = Poem::where('id',$id)->get(); // данные записываются в переменную - скидывает полный объект

        $comments = [];

        $comments = Comment::where('poem_id',$id)->get();

        return view('poem.read',['poems'=>$poems,'comments'=>$comments]); // переменная - poem // вот как тут несколько баз данных
    }

    public function deletePoem(string $id) {
        $poems = Poem::where('id',$id)->delete();
        return redirect()->route('poems'); //как-то сюда редиректить на страницу со списком стихов
    }


    public function showTrashedPoems() {
        $poems = Poem::onlyTrashed()->get();
        return view('poem.trashed', ['poems'=>$poems]);
    }

    public function restorePoem(string $id) {
        //$toBeRestoredPoem = Poem::withTrashed()->where('id',$id)->get(); //он даёт удалённые стихи в виде массива
        $validated = Poem::withTrashed()->where('id',$id)->get();
        //$poem_id = $toBeRestoredPoem[0]->poem_id; // 0 потому что массив
        $poem_id = $validated[0]->id;
        $poems = Poem::where('id',$id)->restore(); // restore даёт кол-во id
        return redirect()->route('poems'); // вернет на стих с которого удалили стих (на страницу стихов)
    }

    /*
    public function getPoem(string $poem_id) {
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
    */

/*
    function elgerhg($a,$b=null,$c=null){

}
*/
}
