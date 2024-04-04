<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Comment;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function showAlbums() {
        $albums = Album::all(); // all() уже показывает только не удаленные сущности
        return view('album.list', ['albums'=>$albums]);
    }

    public function admin_showAlbums() {
        $albums = Album::all(); // all() уже показывает только не удаленные сущности
        return view('album.admin_list', ['albums'=>$albums]);
    }

    public function readAlbum(string $id) {
        $albums = Album::where('id',$id)->get(); // all() уже показывает только не удаленные сущности
        $comments = [];
        $comments = Comment::where('poem_id',$id)->get();
        return view('album.list',['albums'=>$albums,'comments'=>$comments]);
    }

    //form
    public function getAlbum(string $id) {

    }

    public function postAlbum() {

    }
}
