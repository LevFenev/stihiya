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
        $poem = Poem::find($id); // данные записываются в переменную - скидывает полный объект
        /*$comments = [];
        $comments = Comment::where('poem_id',$id)->get();*/
        $deletedComments = Comment::onlyTrashed()->count();
        // а deleted comments как?
        return view('poem.admin.read',['poem'=>$poem,'deletedComments'=>$deletedComments]); // переменная - poem // вот как тут несколько баз данных
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

    public function restorePoem(string $id)
    {
        //$toBeRestoredPoem = Poem::withTrashed()->where('id',$id)->get(); //он даёт удалённые стихи в виде массива
        $validated = Poem::withTrashed()->where('id', $id)->get();
        //$poem_id = $toBeRestoredPoem[0]->poem_id; // 0 потому что массив
//        $poem_id = $validated[0]->id;
        $poems = Poem::where('id', $id)->restore();// restore даёт кол-во id
        $deletedPoems = Poem::onlyTrashed()->count();
        if ($deletedPoems == 0) {
            return redirect()->route('poems');
        } else {
            return redirect()->route('trashedPoems');
        }
    }

    public function poem_Action(string $poem_id) {
        $poem = Poem::find($poem_id);
        if (is_null($poem)) {
            $poem = new Poem();
            $poem->release_date=date('Y-m-d H-i-s');
            $poem->save();
        }
        return view('left', ['poem'=>$poem->getAttributes()]);
    }

    public function poem_postAction(Request $request) {

        $validated = $request->validate([ // валидацию потом сделать
            'title'=>['max:100'],
            'author_id'=>['numeric', 'exists:user,id'],
            'publisher_id'=>['numeric', 'exists:user,id'],
            'release_date'=>['numeric'], // не нюмерик
            'release_year'=>['required', 'numeric', 'min:4'],
            'content'=>[''],
            'storyline'=>[''],
            // photo status бла бла..
        ]);
        $validated = $request->all();

        $poem = new Poem();
        $poem->fill($validated); // в поем модели сделать переменную fillable и туда занести те поля которые должен заполнять пользователь
        $poem->save();
    }

    public function getPoem(string $newxxxyz='') {
        $poem = Poem::find($newxxxyz);
        if (is_null($poem)) {
            $poem = new Poem();
        }
        return view('poem.form', ['poem'=>$poem]); // вернет на стих с которого удалили коммент
    }

    public function postPoem(Request $request) { // в реквесте данные стиха poem's data всё, что угодно
        $validated = $request->validate([ // валидацию потом сделать
            'title'=>['max:100'],
            /*'author_id'=>['numeric', 'exists:user,id'],
            'publisher_id'=>['numeric', 'exists:user,id'],
            'release_date'=>['numeric'], // не нюмерик*/
            'release_year'=>['required', 'numeric', 'min:4'],
            'content'=>[''],
            'storyline'=>[''],
            // photo status бла бла..
        ]);

        $poem = new Poem();
        $poem->fill($validated);
        $poem->save();

        return redirect()->route('poems', ['id'=>$poem->id]); // вернет на стих с которого удалили коммент
    }
}
