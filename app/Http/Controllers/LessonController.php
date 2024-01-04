<?php

namespace App\Http\Controllers;

use App\Models\Poem;
use App\Models\User;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function myPage() {
        $poems = Poem::all();
        return view('lesson', ['poems'=>$poems]);
    }
}
