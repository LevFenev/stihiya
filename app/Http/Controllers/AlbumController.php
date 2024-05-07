<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function showAlbums() {
        $albums = Album::all(); // all() уже показывает только не удаленные сущности
        return view('album.list', ['albums'=>$albums]);
    }

    public function admin_showAlbums() {
        $albums = Album::all(); // all() уже показывает только не удаленные сущности
        return view('album.admin.list', ['albums'=>$albums]);
    }

    public function readAlbum(string $id) {
        $albums = Album::where('id',$id)->get(); // all() уже показывает только не удаленные сущности
        $comments = [];
        $comments = Comment::where('poem_id',$id)->get();
        return view('album.list',['albums'=>$albums,'comments'=>$comments]);
    }

    //form
    public function getAlbum(string $id='') {
        $album = Album::find($id);
        if(is_null($album)){
            $album = new Album();
        }
        return view('album.form', ['album'=>$album]);
    }

    public function postAlbum(Request $request) {
        $validated = $request->validate([ // to be changed after db update
            'id'=>['numeric'],
            'author'=>['required'],
            'title'=>['required'],
            'release_year'=>['required'],
            'release_date'=>[''],
            'cover'=>[''],
        ]);

        $album = null;

        if (isset($validated['id'])){
            $album = Album::find($validated['id']);
        }

        if (is_null($album)) {
            $album = new Album();
        }
        $album->fill($validated);
        $album->save();

        if ($request->hasFile('cover')) {
            $albumCover = $request->file('cover')->storeAs('uploads/album', 'cover'.$album->id.'.png', 'public');
            $content = Storage::url('uploads/album/cover'.$album->id.'.png');
            $album->cover=$content;
            $album->save();
        }

        return redirect()->route('albums', ['id'=>$album->id]);
    }
}
