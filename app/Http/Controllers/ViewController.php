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
        return view('registration');
    }

    public function showMain() { // показывает мейн пейдж для юзеров
        return view('main');
    }

    public function admin_showMain() {
        return view('admin_main');
    }
}
