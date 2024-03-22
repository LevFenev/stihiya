<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showMain() { // показывает мейн пейдж для юзеров
        return view('main');
    }
}
