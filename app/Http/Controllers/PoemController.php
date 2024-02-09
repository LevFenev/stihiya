<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Poem;
use App\Models\User;
use Illuminate\Http\Request;

class PoemController extends Controller // ВОТ ЗДЕСЬ ДВЕ ТАБЛИЦЫ
{
    public function showPoems() { //action контроллера
        $poems = Poem::all();
        return view('poem.list', ['poems'=>$poems]);
    }

    public function readPoem(string $id) {
        $poems = Poem::where('id',$id)->get(); // данные записываются в переменную - скидывает полный объект

        $comments = [];

        $comments = Comment::where('poem_id',$id)->get();

        return view('poem.read',['poems'=>$poems,'comment'=>$comments]); // переменная - poem // вот как тут несколько баз данных
    }

    public function deletePoem(string $id) {
        $poems = Poem::where('poem_id',$id)->delete();
        return view('poem.delete', ['poems'=>$poems]);
    }
/*
    function elgerhg($a,$b=null,$c=null){

}
*/
}
