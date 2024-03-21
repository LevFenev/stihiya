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
        $collections = Collection::find($id);
        return view('collection.collection2', ['collections'=>$collections]);
    }

    public function admin_showCollections() {
        $collections = Collection::all();
        $deletedCollections = Collection::onlyTrashed()->count();
        return view('collection.admin.list', ['collections'=>$collections],['deletedCollections'=>$deletedCollections]);
    }

    /*public function readCollection(string $id) {
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


        $poems = Poem::whereIn('id',$poem_ids)->get(); // теперь для всех строчек один запрос / 19.01.24
        //print_r($poems);

        return view('collection.read',['collections'=>$collections, 'poems'=>$poems]); // переменная - poem
    }*/

    public function admin_readCollection(string $id) {

    }

    // остановился тут 7.3.24
    public function deleteCollection(string $id) {
        $deletedCollections = Collection::withTrashed()->where('id',$id)->get();
        // $poem_id = $deletedComments[0]->poem_id; взято с удаления комментария, пожтому остался poem id
        $collections = Collection::where('id',$id)->delete();
        //return redirect()->route('collections' /*, ['id'=>$poem_id]*/ );
        $collections = Collection::all();
        $deletedCollections = Collection::onlyTrashed()->count();
        return view('collection.admin.list', ['collections'=>$collections],['deletedCollections'=>$deletedCollections]);
    }

    public function showTrashedCollections() {
        $collections = Collection::onlyTrashed()->get();
        return view('collection.admin.trashed', ['collections'=>$collections]);
    }

    public function restoreCollection(string $id) {
        $toBeRestoredCollection = Collection::withTrashed()->where('id',$id)->get();
        //$poem_id = $toBeRestoredComment[0]->poem_id;
        $collections = Collection::where('id',$id)->restore(); // restore даёт кол-во id
        $collections = Collection::all();
        $deletedCollections = Collection::onlyTrashed()->count();
        return view('collection.admin.list', ['collections'=>$collections],['deletedCollections'=>$deletedCollections]);
    }
}
