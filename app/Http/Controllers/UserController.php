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
        return view('user.admin.list', ['users' => $users]);
    }

    public function restoreUser(string $id) {
        $toBeRestoredUser = User::withTrashed()->where('id',$id)->get();
        $users = User::where('id',$id)->restore();
        return view('user.admin.list', ['users' => $users]);
    }

    public function showUsers() {
        $users = User::all();
        return view('user.list', ['users'=>$users]);
    }

    public function admin_showUsers() {
        $users = User::all();
        return view('user.admin.list', ['users'=>$users]);
    }

    public function showUserComments(string $id) {
        $users = User::where('id',$id)->get();
//        $comments = Comment::where('user_id',$id)->get();
//        print_r($comments->count());
        // и поэмы тоже надо в модель засунуть
//        $poems = Poem::where('author_id',$id)->get();
        return view('user.personal', ['users'=>$users]);
    }

    /*
     public function showPoems(string $id) {
        $poems = Poem::where('id',$id)->get();
        return view('poems.list', ['poems'=>$poems]);
    }
     */

    public function getUser(string $new='') { // юезр в форму
        $user = User::find($new);
        if (is_null($user)) {
            $user = new User();
        }
        return view('user.form', ['user'=>$user]);
    }

    public function postUser(Request $request) {
        $validated = $request->validate([
            'id'=>['numeric'],
            'name'=>['required, max:100'],
            'bio'=>['required, min:5'],
        ]);

        $user = User::find($validated['id']);
        if(is_null($user)) {
            $user = new User();
        }
        $user->fill($validated);
        $user->save();

        if ($request->hasFile('avatar')) {
            $userAvatar = $request->file('avatar')->storeAs('uploads/user', 'avatar'.$user->id.'.png', 'public');
            $content = Storage::url('uploads/avatar'.$user->id.'.png');
            $user->avatar=$content;
            $user->save();
        }

        return redirect()->route('users', ['id'=>$user->id]);
    }


}
