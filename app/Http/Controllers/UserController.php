<?php

namespace App\Http\Controllers;

use App\Models\Poem;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUsers() {
        $users = User::all();
        return view('users.list', ['users'=>$users]);
    }

    public function showPoems() {
        $poems = Poem::all();
        return view('poems.list', ['poems'=>$poems]);
    }
}
