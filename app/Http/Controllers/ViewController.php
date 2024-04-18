<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function login() {
        return view('login');
    }

    public function admin_login() {
        return view('admin_login');
    }

    public function reg() {
        return view('regist_form');
    }

    public function showMain() { // показывает мейн пейдж для юзеров
        return view('main');
    }

    public function admin_showMain() {
        return view('admin_main');
    }

    public function showFormChoice() {
        return view('forms');
    }

    public function showPoemForm() {
        return view('poem.form');
    }

    public function showCollectionForm() {
        return view('collection.form');
    }

    public function showSongForm() {
        return view('song.form');
    }

    public function showAlbumForm() {
        return view('album.form');
    }
}
