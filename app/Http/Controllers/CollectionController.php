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

        $poem_ids = [];

        foreach ($collections as $collection) {
            // print $collection->poem_id;
            $collection_content = PoemCollectionLink::where('collection_id',$collection->id)->get();

            foreach ($collection_content as $collection_item) {
                //print $collection_item->poem_id;
                $poem_ids[] = $collection_item->poem_id;
                // Poem::where('id',$collection_item->poem_id)->get();
            }
        }

        print_r($poem_ids);

        $poems = Poem::whereIn('id',$poem_ids); // теперь для всех строчек один запрос / 19.01.24

        return view('collection.read',['collections'=>$collections, 'poems'=>$poems]); // переменная - poem
    }
}
