<?php

namespace App\Http\Controllers;

use App\Models\Poem;
use App\Models\User;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function myPage() {
        $users = Poem::all()->get();
        return view('lesson', ['poets'=>$users]);
    }
}
