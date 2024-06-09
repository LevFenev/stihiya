<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\LikeLink;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;
use function PHPUnit\Runner\validate;
use function Ramsey\Collection\element;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function helloPage()
    {
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
        $like = LikeLink::where([
            'element_id' => $request->element_id,
            'element_name' => $request->element_type,
            'user_id' => Auth::user()->id
        ])->first();
        //$element_name(element_id)->likes_count = +1;
        if (is_null($like)) {
            $like = new LikeLink();
        }
        $like->element_id = $request->element_id;
        $like->element_name = $request->element_type;
        $like->reaction_id = $request->reaction_id;
        $like->user_id = Auth::user()->id;
        $like->save();

        return response()->json([
            'success' => true
        ], options:JSON_UNESCAPED_UNICODE);
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
        Like::where('id', $reaction_id)->update($likeData);
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
        } else if (is_null($like)) {
            $like = new Like();
        }

        $like->fill($editedReactions);
        $like->save();

        return view('main');
    }

    public function getLikesJSON(Request $request)
    {
        $likes = LikeLink::where([
            'element_id' => $request->element_id,
            'element_name' => $request->element_type
        ])->get();

        $likeCount = [];

        // to be changed with group by
        foreach ($likes as $like) {
            if (!isset($likeCount[$like->reaction_id])) {
                $likeCount[$like->reaction_id] = 0;
            }
            $likeCount[$like->reaction_id]++;
        }

        $reactions = Like::all();

        foreach ($reactions as $reaction) {
            if (!isset($likeCount[$reaction->id])) {
                $likeCount[$reaction->id] = 0;
            }
            $reactionsNames[] =
                [
                    'id' => $reaction->id,
                    'name' => $reaction->name,
                    'amount' => $likeCount[$reaction->id]
                ];
        }

        return response()->json([
            'reactionNames' => $reactionsNames
        ], options:JSON_UNESCAPED_UNICODE);
    }
}
