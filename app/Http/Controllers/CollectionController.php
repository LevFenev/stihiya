<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Poem;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function myPage() {
        $collections = Collection::all();
        return view('collection.list', ['collections'=>$collections]);
    }

    public function myPage2(string $id) {
        $collections = Collection::where('id',$id)->get(); // данные записываются в переменную - скидывает полный объект
        return view('collection.show',['collections'=>$collections]); // переменная - poem
    }
}
