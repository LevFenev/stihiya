<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Poem;
use Illuminate\Http\Request;

class PoemController extends Controller // ВОТ ЗДЕСЬ ДВЕ ТАБЛИЦЫ - какие таблицы? 6.3.24
{
    public function showPoems() { //action контроллера
        $poems = Poem::all(); // all() уже показывает только не удаленные сущности
        return view('poem.list', ['poems'=>$poems]);
    }

    public function admin_showPoems() { //action контроллера
        $poems = Poem::all(); // all() уже показывает только не удаленные сущности
        $deletedPoems = Poem::onlyTrashed()->count();
        return view('poem.admin.list', ['poems'=>$poems],['deletedPoems'=>$deletedPoems]);
    }

    public function readPoem(string $id) {
        $poems = Poem::where('id',$id)->get(); // данные записываются в переменную - скидывает полный объект
        return view('poem.read',['poems'=>$poems]); // переменная - poem // вот как тут несколько баз данных
    }

    public function admin_readPoem(string $id) {
        $poems = Poem::where('id',$id)->get(); // данные записываются в переменную - скидывает полный объект
        /*$comments = [];
        $comments = Comment::where('poem_id',$id)->get();*/
        $deletedComments = Comment::onlyTrashed()->count();
        // а deleted comments как?
        return view('poem.admin.read',['poems'=>$poems,'deletedComments'=>$deletedComments]); // переменная - poem // вот как тут несколько баз данных
    }

    public function deletePoem(string $id) {
        Poem::where('id',$id)->delete();
        return redirect()->route('poems'); //как-то сюда редиректить на страницу со списком стихов
    }


    public function showTrashedPoems() {
        $poems = Poem::onlyTrashed()->get();
        /*if ($poems->storyline == null){ // так нужно автоматически сделать для всех элементов выводящихся на страницу
            $poems->storyline = "(отсутствует)"; // не работает потому что обращается ко всем стихам сразу (там нет storyline)
        }*/

        return view('poem.admin.trashed', ['poems'=>$poems]);
    }

    public function restorePoem(string $id) {
        //$toBeRestoredPoem = Poem::withTrashed()->where('id',$id)->get(); //он даёт удалённые стихи в виде массива
        $validated = Poem::withTrashed()->where('id',$id)->get();
        //$poem_id = $toBeRestoredPoem[0]->poem_id; // 0 потому что массив
//        $poem_id = $validated[0]->id;
        $poems = Poem::where('id',$id)->restore();// restore даёт кол-во id
        $deletedPoems = Poem::onlyTrashed()->count();
        if ($deletedPoems==0){
            return redirect()->route('poems');
        } else {
            return redirect()->route('trashedPoems');
        }
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
