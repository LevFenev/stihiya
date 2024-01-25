<?php

namespace App\Http\Controllers;

use App\Models\Poem;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUsers(string $id) { // вот здесь вот базы данных подключаются?
        $users = User::all();
        $poems = Poem::where('id',$id)->get();
        return view('users.list', ['users'=>$users], ['poems'=>$poems]);
    }

    /*
     public function showPoems(string $id) {
        $poems = Poem::where('id',$id)->get();
        return view('poems.list', ['poems'=>$poems]);
    }
     */
}
