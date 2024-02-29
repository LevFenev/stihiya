<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SongController extends Controller
{
    /*public function showSongs() { //action контроллера
        $poems = Poem::all(); // all() уже показывает только не удаленные сущности
        return view('poem.list', ['poems'=>$poems]);
    }*/ // showSongs это по сути альбом, который уже в проекте есть, или будет отдельный общий список с песнями?

    /*public function admin_showPoems() { //action контроллера
        $poems = Poem::all(); // all() уже показывает только не удаленные сущности
        return view('poem.admin_list', ['poems'=>$poems]);
    }*/

    public function readSong(string $id) {
        $songs = Song::where('id',$id)->get(); // данные записываются в переменную - скидывает полный объект

        $comments = [];

        $comments = Comment::where('song_id',$id)->get();

        return view('song.read',['songs'=>$songs,'comments'=>$comments]);
    }

    public function getSong(string $id) {
        //
    }




}
