<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function deleteUser(string $id) {
        $deletedUsers = User::withTrashed()->where('id',$id)->get(); //with чтобы показывать всех юзеров. может захочется его удалить прям полностью
        $users = User::where('id',$id)->delete();
        return redirect()->route('admin_users');
    }

    public function showTrashedUsers(string $id) {
        $users = User::onlyTrashed()->get();
        return view('user.admin.list', ['user' => $users]);
    }

    public function restoreUser(string $id) {
        $toBeRestoredUser = User::withTrashed()->where('id',$id)->get();
        $users = User::where('id',$id)->restore();
        return view('user.admin.list', ['user' => $users]);
    }

    public function showUsers() {
        $users = User::all()->get();
        return view('user.list', ['user'=>$users]);
    }

    public function admin_showUsers() {
        $users = User::all()->get();
        return view('user.admin.list', ['user'=>$users]);
    }

    public function showUserComments(string $id) {
        $users = User::where('id',$id)->get();
//        $comments = Comment::where('user_id',$id)->get();
//        print_r($comments->count());
        // и поэмы тоже надо в модель засунуть
//        $poems = Poem::where('author_id',$id)->get();
        return view('user.personal', ['user'=>$users]);
    }

    /*
     public function showPoems(string $id) {
        $poems = Poem::where('id',$id)->get();
        return view('poems.list', ['poems'=>$poems]);
    }
     */
}
