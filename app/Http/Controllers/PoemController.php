<?php

namespace App\Http\Controllers;

use App\Models\Poem;
use App\Models\User;
use Illuminate\Http\Request;

class PoemController extends Controller
{
    public function myPage() {
        $poems = Poem::all();
        return view('poem.list', ['poems'=>$poems]);
    }
}
