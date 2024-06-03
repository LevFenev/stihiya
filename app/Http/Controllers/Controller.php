<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;
use function PHPUnit\Runner\validate;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function helloPage() {
        return view('index');
    }

    public function login()
    {
        return view('login');
    }

    public function getReg()
    {
        $user = new User();
        return view('reg', ['user' => $user]);
    }

    public function postReg(Request $request)
    {
        $userData = $request->validate([
            'name' => '',
            'username' => '',
            'email' => ['required', 'email', 'unique:user'],
            'password' => ['required'],
            'bio' => '',
            'avatar' => '',
            'status' => '',
        ]);
        User::create($userData); //new+fill+save
    }

    // return view('reg', ['user' => $user]);

    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $userData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($userData)) {
            $request->session()->regenerate();
            return redirect()->intended('main');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logOut(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('main');
    }

    public function toLike(Request $request)
    {
        //$element_name(element_id)->likes_count = +1;
        $like = new Like();
        $like->element_id = $request->element_id;
        $like->element_name = $request->element_name;
        $like->reaction_id = $request->reaction_id;
        $like->save();
    }

    /*public function toLikePost(Request $request)
    {
        //$element_name(element_id)->likes_count = +1;
        $likeData = $request->validate([

        ]);
    }*/

    public function showLikesForm()
    {
        return view('likes_form');
    }

    public function createReaction(Request $request)
    {
        $reactionData = $request->validate([
            'id' => ['required'],
            'name' => ['required']
        ]);
        Like::create($reactionData);
    }

    public function editReaction(Request $request)
    {
        $likeData = Like::find($reaction_id);
        if (is_null($reaction_id)) {
            $likeData = new Like();
        }
        Like::where('id',$reaction_id)->update($likeData);
        return view('likes_edit', [$likeData]);
    }

    /*public function editReaction(string $reaction_id)
    {
        $likeData = Like::find($reaction_id);
        if (is_null($reaction_id)) {
            $likeData = new Like();
        }
        return view('likes_edit', [$likeData]);
    }*/

    public function postEditReaction(Request $request)
    {
        $editedReactions = $request->validate([
            'id' => [''],
            'name' => ['']
        ]);

        $like = null;

        if (isset($editedReactions['id'])) {
            $like::find($editedReactions['id']);
        } else if (is_null($like)){
            $like = new Like();
        }

        $like->fill($editedReactions);
        $like->save();

        return view('main');
    }

    public function getLikesJSON()
    {
        $reactions = Like::all();

        $reactionsNames = [];

        foreach ($reactions as $reaction) {
            $reactionsNames[] = $reaction->name;
        }

        return response()->json([
            'reactionNames' => $reactionsNames
        ], options:JSON_UNESCAPED_UNICODE);
    }
}
