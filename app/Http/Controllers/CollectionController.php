<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Poem;
use App\Models\PoemCollectionLink;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function showCollections() {
        $collections = Collection::all();
        return view('collection.list', ['collections'=>$collections]);
    }

    public function readCollection(string $id) {
        $collections = Collection::where('id',$id)->get(); // данные записываются в переменную - скидывает полный объект

        $poems = [];

        foreach ($collections as $collection) {
            // print $collection->poem_id;
            $collection_content = PoemCollectionLink::where('collection_id',$collection->id)->get();

            foreach ($collection_content as $collection_item) {
                print $collection_item->poem_id;
                $poems[] = Poem::where('id',$collection_item->poem_id);
            }
        }

        return view('collection.read',['collections'=>$collections, 'poems'=>$poems]); // переменная - poem
    }
}
