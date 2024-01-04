<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function myPage() {
        $users = User::all();
        return view('poem.list', ['users'=>$users]);
    }
}
