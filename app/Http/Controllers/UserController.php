<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Poem;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUsers() {
        $users = User::all();
        return view('users.list', ['users'=>$users]);
    }

    public function showUserComments(string $id) {
        $users = User::where('id',$id)->get();
        $comments = Comment::where('user_id',$id)->get();
        print_r($comments->count());
        $poems = Poem::where('author_id',$id)->get();
        return view('users.personal', ['users'=>$users,'comment'=>$comments,'poems'=>$poems]);
    }

    /*
     public function showPoems(string $id) {
        $poems = Poem::where('id',$id)->get();
        return view('poems.list', ['poems'=>$poems]);
    }
     */
}
