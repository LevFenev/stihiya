<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

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
            'email' => ['required', 'email'],
            'password' => ['required'],
            'bio' => '',
            'avatar' => '',
            'status' => '',
        ]);
        User::create($userData);

        // return view('reg', ['user' => $user]);
    }
}
