<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Poem;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function myPage() {
        $collections = Collection::all();
        return view('collection.list', ['collection'=>$collections]);
    }
}
