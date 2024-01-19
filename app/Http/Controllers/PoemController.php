<?php

namespace App\Http\Controllers;

use App\Models\Poem;
use App\Models\User;
use Illuminate\Http\Request;

class PoemController extends Controller
{
    public function showPoems() { //action контроллера
        $poems = Poem::all();
        return view('poem.list', ['poems'=>$poems]);
    }

    public function readPoem(string $id) {
        $poems = Poem::where('id',$id)->get(); // данные записываются в переменную - скидывает полный объект
        return view('poem.read',['poems'=>$poems]); // переменная - poem
    }
}
