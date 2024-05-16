<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

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
            'email'=>['required', 'email'],
            'password'=>['required'],
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

}
