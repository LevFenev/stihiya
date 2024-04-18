<?php

namespace App\Http\Controllers;

use App\Models\Poem;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function showSongs() {
        $songs = Song::all(); // all() уже показывает только не удаленные сущности
        return view('song.list', ['songs'=>$songs]);
    } // showSongs это по сути альбом, который уже в проекте есть, или будет отдельный общий список с песнями?

    public function admin_showSongs() {
        $songs = Song::all(); // all() уже показывает только не удаленные сущности
        return view('song.admin.list', ['songs'=>$songs]);
    }

    public function readSong(string $id) {
        $songs = Song::where('id',$id)->get(); // данные записываются в переменную - скидывает полный объект

        /*$comments = [];
        $comments = Comment::where('song_id',$id)->get();*/

        return view('song.read',['songs'=>$songs]);
    }

    public function admin_readSong(string $id) {
        $songs = Song::where('id',$id)->get(); // данные записываются в переменную - скидывает полный объект

        /*$comments = [];

        $comments = Comment::where('song_id',$id)->get();*/

        return view('song.admin.read',['songs'=>$songs]);
    }

    public function deleteSong(string $id) {
        Song::where('id',$id)->delete();
        return redirect()->route('songs');
    }

    public function showTrashedSongs() {
        $songs = Song::onlyTrashed()->get();
        return view('poem.admin.trashed', ['trashedSongs'=>$songs]);
    }

    public function restoreSong(string $id) {
        Song::where('id',$id)->restore();// restore даёт кол-во id
        $deletedSongs = Song::onlyTrashed()->count();
        if ($deletedSongs==0){
            return redirect()->route('songs');
        } else {
            return redirect()->route('trashedSongs');
        }
    }

/*{if id совпадает
не сохранять, а изменить сущ стих}
сохраняет новый стих*/

    public function leftAction(string $poem_id='') {
        $poem = Poem::find($poem_id);
        if (is_null($poem)) {
            $poem = new Poem();
            //$poem->release_date=date('Y-m-d H-i-s');
        }
        return view('left', ['poem'=>$poem->getAttributes()]);
    }

    public function postLeftAction(Request $request) {
        $validated = $request->validate([ // валидацию потом сделать
            'title'=>['max:100'],
            'content'=>[''],
            'leftFile'=>['mimes:jpg,png,gif|max:3'] // размер в килобайтах
            // photo status бла бла..
        ]);
        print_r($validated);
        if ($request->hasFile('leftFile')){
//            print_r($_FILES);
            $file = $request->file('leftFile'); // ф-ия file
//            move_uploaded_file($_FILES['leftFile']['tmp_name'], '../uploads/'.date('H-i-s').'mood.png');
            $file = $request->file('leftFile')->storeAs('uploads', 'mood.png', 'public'); // ф-ия file
//            print($file->getClientOriginalName());
        }
        exit();

        $validated = $request->all();
        unset($validated['_token']);
        unset($validated['id']);
        unset($validated['deleted_at']);
        unset($validated['updated_at']);
        unset($validated['created_at']);
        file_put_contents('left_log.txt', print_r($validated, true));

        $poem = new Poem();
        $poem->fill($validated); // в поем модели сделать переменную fillable и туда занести те поля которые должен заполнять пользователь
        $poem->save();
    }

    public function getSong(string $id='') {
        $song = Song::find($id);
        if (is_null($song)) {
            $song = new Song();
        }
        return view('song.form', ['song'=>$song]);
    }

    public function postSong(Request $request) {
        $validated = $request->validate([
            'id'=>['numeric', 'min:1'],
            'title'=>['max:100']
        ]);

        $song = Song::find($validated['id']);
        if (is_null($song)) {
            $song = new Song();
        }
        $song->fill($validated);
        $song->save();

        return redirect()->route('songs', ['id'=>$song->id]);
    }

}
