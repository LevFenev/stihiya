<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Poem;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function showCollections() {
        $collections = Collection::all();
        return view('collection.list', ['collections'=>$collections]);
    }

    public function readCollection(string $id) {
        $collections = Collection::where('id',$id)->get(); // данные записываются в переменную - скидывает полный объект

        foreach ($collections as $collection) {
            print $collection->id;
        }

        return view('collection.read',['collections'=>$collections]); // переменная - poem
    }
}
