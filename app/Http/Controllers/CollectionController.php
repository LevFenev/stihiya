<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Poem;
use App\Models\PoemCollectionLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Illuminate\Process\options;

class CollectionController extends Controller
{
    public function showCollections() {
        $collections = Collection::all();
        return view('collection.list', ['collections'=>$collections]);
    }

    public function readCollection(string $id) {
        $collection = Collection::find($id);
        return view('collection.collection2', ['collection'=>$collection]);
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
        $collection = Collection::find($id);
        return view('collection.admin.read', ['collection'=>$collection]);
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

    //form
    public function getCollection(string $id='') {
        $collection = Collection::find($id);
        if (is_null($collection)) {
            $collection = new Collection();
        }
        return view('collection.form', ['collection'=>$collection]);
    }

    public function postCollection(Request $request) {
        $validated = $request->validate([
            'id'=>['numeric'],
            'author_id'=>['required', 'numeric', 'exists:user,id'],
            'title'=>['required'],
            'description'=>['required'],
            'release_year'=>['required'],
            'cover'=>[''],
            'is_listenable'=>['required'],
        ]);

        $collection = null;

        if (isset($validated['id'])){
            $collection = Collection::find($validated['id']);
        }

        if (is_null($collection)) {
            $collection = new Collection();
        }

        $collection->fill($validated);
        $collection->save();

        $inCollectionInput = $request->input('inCollection');
        foreach ($inCollectionInput as $i) {
            // $collection->id
            // poem_id = $i
            if (PoemCollectionLink::where(['collection_id'=>$collection->id, 'poem_id'=>$i])->count()==0) {
                $poemCollectionLink = new PoemCollectionLink();
                $poemCollectionLink->collection_id = $collection->id;
                $poemCollectionLink->poem_id = $i;
                $poemCollectionLink->created_at = date('Y-m-d H:i:s');
                $poemCollectionLink->updated_at = date('Y-m-d H:i:s');
                $poemCollectionLink->save();
            }
        }

        if ($request->hasFile('cover')) {
            $collectionCover = $request->file('cover')->storeAs('uploads/collection', 'cover'.$collection->id.'.png', 'public');
            $content = Storage::url('uploads/cover'.$collection->id.'.png');
            $collection->cover=$content;
            $collection->save();
        }

        return redirect()->route('collections', ['id'=>$collection->id]);
    }

    public function getPoemsJSON(string $id='') {
        $user = Auth::user();
        $userPoems = $user->poems;
        $collection = Collection::find($id);
        $collectionPoems = $collection->poems;

        $userPoemsNames = [];
        $collectionPoemsNames = [];

        foreach ($collectionPoems as $poem) {
            $collectionPoemsNames[$poem->id] = $poem->title;
        }

        foreach ($userPoems as $poem) {
            if (isset($collectionPoemsNames[$poem->id])) {
                $userPoemsNames[] = $poem->title;
            }
        }

        // inCollection - уже в какой-то коллекции
        // general - в этой коллекции
        return response()->json([
            'general'=>$collectionPoemsNames,
            'inCollection'=>$userPoemsNames,
        ],options:JSON_UNESCAPED_UNICODE);
    }
}
