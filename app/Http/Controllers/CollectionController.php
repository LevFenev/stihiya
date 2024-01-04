<?php

namespace App\Http\Controllers;

use App\Models\Poem;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function myPage() {
        $collections = Poem::all();
        return view('collection.list.blade.php', ['collection'=>$collections]);
    }
}
