<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function showSongs() {
        $songs = Song::all(); // all() уже показывает только не удаленные сущности
        return view('song.list', ['songs'=>$songs]);
    } // showSongs это по сути альбом, который уже в проекте есть, или будет отдельный общий список с песнями?

    public function admin_showSongs() {
        $songs = Song::all(); // all() уже показывает только не удаленные сущности
        return view('song.admin.list', ['songs'=>$songs]);
    }

    public function readSong(string $id) {
        $songs = Song::where('id',$id)->get(); // данные записываются в переменную - скидывает полный объект

        /*$comments = [];
        $comments = Comment::where('song_id',$id)->get();*/

        return view('song.read',['songs'=>$songs]);
    }

    public function admin_readSong(string $id) {
        $songs = Song::where('id',$id)->get(); // данные записываются в переменную - скидывает полный объект

        /*$comments = [];

        $comments = Comment::where('song_id',$id)->get();*/

        return view('song.admin.read',['songs'=>$songs]);
    }

    public function deleteSong(string $id) {
        Song::where('id',$id)->delete();
        return redirect()->route('songs');
    }

    public function showTrashedSongs() {
        $songs = Song::onlyTrashed()->get();
        return view('poem.admin.trashed', ['trashedSongs'=>$songs]);
    }

    public function restorePoem(string $id) {
        Song::where('id',$id)->restore();// restore даёт кол-во id
        $deletedSongs = Poem::onlyTrashed()->count();
        if ($deletedSongs==0){
            return redirect()->route('songs');
        } else {
            return redirect()->route('trashedSongs');
        }
    }

    public function getSong(string $id) {
        //
    }



}
