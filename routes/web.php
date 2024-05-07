<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', [App\Http\Controllers\Controller::class, 'getLogin'])->name('login');

Route::post('/login/post', [App\Http\Controllers\Controller::class, 'postLogin']);

Route::get('/logout', [App\Http\Controllers\Controller::class, 'logOut']);

Route::get('admin/login', [App\Http\Controllers\ViewController::class, 'admin_login']);

Route::get('/reg', [App\Http\Controllers\Controller::class, 'getReg']);

Route::post('/reg', [App\Http\Controllers\Controller::class, 'postReg']);

Route::get('/left/{poem_id?}', [\App\Http\Controllers\SongController::class, 'leftAction'])->where('poem_id','[0-9]+');

Route::post('/left', [\App\Http\Controllers\SongController::class, 'postLeftAction']);

Route::get('/forms', [\App\Http\Controllers\ViewController::class, 'showFormChoice']);


Route::get('/main', [\App\Http\Controllers\ViewController::class, 'showMain']);

Route::get('/admin/main', [\App\Http\Controllers\ViewController::class, 'admin_showMain']);


/**
 * POEMS / СТИХИ
 */

//Route::get('/poems/{id}', [\App\Http\Controllers\PoemController::class, 'readPoem']); // отсюда получает id

Route::get('/poems/{id}', [\App\Http\Controllers\PoemController::class, 'readPoem'])->where('id','[0-9]+')->name('poems'); // отсюда получает id

Route::get('/poems/post/{newxxxyz?}', [\App\Http\Controllers\PoemController::class, 'getPoem'])->middleware('auth');

//Route::get('/poems/post', [\App\Http\Controllers\PoemController::class, 'getPoem']); менее элегантно

Route::post('/poems/post', [\App\Http\Controllers\PoemController::class, 'postPoem']);

Route::get('/poems', [\App\Http\Controllers\PoemController::class, 'showPoems']);

// admin
Route::get('admin/poems/trashed', [\App\Http\Controllers\PoemController::class, 'showTrashedPoems'])->name('trashedPoems');

Route::get('admin/poems/{id}', [\App\Http\Controllers\PoemController::class, 'admin_readPoem']);

Route::get('admin/poems/restore/{id}', [\App\Http\Controllers\PoemController::class, 'restorePoem']);

Route::get('admin/poems/delete/{id}', [\App\Http\Controllers\PoemController::class, 'deletePoem']);

Route::get('admin/poems', [\App\Http\Controllers\PoemController::class, 'admin_showPoems'])->name('admin_poems');

/**
 * COLLECTIONS / СБОРНИКИ
 */

Route::get('collections/{id}', [\App\Http\Controllers\CollectionController::class, 'readCollection'])->where('id','[0-9]+');

Route::get('/collections/post/{new_id?}', [\App\Http\Controllers\CollectionController::class, 'getCollection'])->middleware('auth')->where('id','[0-9]+');

Route::post('/collections/post', [\App\Http\Controllers\CollectionController::class, 'postCollection']);

Route::get('collections', [\App\Http\Controllers\CollectionController::class, 'showCollections'])->name('collections');

// admin

Route::get('admin/collections/trashed', [\App\Http\Controllers\CollectionController::class, 'showTrashedCollections']);

Route::get('admin/collections', [\App\Http\Controllers\CollectionController::class, 'admin_showCollections']);

Route::get('admin/collections/{id}', [\App\Http\Controllers\CollectionController::class, 'admin_readCollection']);

Route::get('admin/collections/delete/{id}', [\App\Http\Controllers\CollectionController::class, 'deleteCollection']);

Route::get('admin/collections/restore/{id}', [\App\Http\Controllers\CollectionController::class, 'restoreCollection']);

/**
 * ALBUMS / АЛЬБОМЫ
 */

Route::get('albums/{album_id}', [\App\Http\Controllers\AlbumController::class, 'readAlbum']); // без "/read"?

Route::get('albums', [\App\Http\Controllers\AlbumController::class, 'showAlbums'])->name('albums');

Route::get('/albums/post/{new_id?}', [\App\Http\Controllers\AlbumController::class, 'getAlbum'])->middleware('auth')->where('id','[0-9]+');

Route::post('/albums/post', [\App\Http\Controllers\AlbumController::class, 'postAlbum']);

// admin
Route::get('admin/albums', [\App\Http\Controllers\AlbumController::class, 'admin_showAlbums']);

Route::get('admin/albums/read/{album_id}', [\App\Http\Controllers\AlbumController::class, 'admin_readAlbum']);

/**
 * SONGS / ПЕСНИ
 */

Route::get('/admin/songs/delete/{id}', [\App\Http\Controllers\SongController::class, 'deleteSong']);

Route::get('/admin/songs/restore/{id}', [\App\Http\Controllers\SongController::class, 'restoreSong']);

Route::get('/admin/songs', [\App\Http\Controllers\SongController::class, 'admin_showSongs']);

//Route::get('/songs/post/', [\App\Http\Controllers\SongController::class, 'showSongs']);

Route::get('/songs/post/{new_id?}', [\App\Http\Controllers\SongController::class, 'getSong'])->middleware('auth');

Route::post('/songs/post', [\App\Http\Controllers\SongController::class, 'postSong']);

Route::get('/songs/{id}', [\App\Http\Controllers\SongController::class, 'readSong']);

Route::get('/songs', [\App\Http\Controllers\SongController::class, 'showSongs'])->name('songs');

/**
 * COMMENTS / КОММЕНТАРИИ
 */

Route::get('/poem/{poem_id}/comments/post/{new?}', [\App\Http\Controllers\CommentController::class, 'getComment'])->middleware('auth');

Route::post('/comments/post', [\App\Http\Controllers\CommentController::class, 'postComment']);

// before
//Route::get('comments/post/{poem_id}', [\App\Http\Controllers\CommentController::class, 'getComment']); // отвечает за форму

//Route::post('comments/post', [\App\Http\Controllers\CommentController::class, 'postComment']); // отвечает за публикацию и т.д.

// admin

Route::get('admin/comments/delete/{id}', [\App\Http\Controllers\CommentController::class, 'deleteComment']);

Route::get('admin/comments/trashed', [\App\Http\Controllers\CommentController::class, 'showTrashedComments']);

Route::get('admin/comments/restore/{id}', [\App\Http\Controllers\CommentController::class, 'restoreComment']);

/**
 * USERS / ПОЛЬЗОВАТЕЛИ
 */

Route::get('users', [\App\Http\Controllers\UserController::class, 'showUsers'])->name('users');

Route::get('users/{id}', [\App\Http\Controllers\UserController::class, 'showUserComments'])->where('id','[0-9]+'); // отсюда получает id (string $id)

Route::get('/users/post/{new?}', [\App\Http\Controllers\UserController::class, 'getUser']);

Route::post('/users/post', [\App\Http\Controllers\UserController::class, 'postUser']);

// admin

Route::get('admin/users', [\App\Http\Controllers\UserController::class, 'admin_showUsers'])->name('admin_users');

Route::get('admin/users/{id}', [\App\Http\Controllers\UserController::class, 'showUserComments']);

Route::get('admin/users/delete/{id}', [\App\Http\Controllers\UserController::class, 'deleteUser']);

// стихи
// сюда нужно poem restore

// сборники
/*
Route::get('admin/collections', [\App\Http\Controllers\CollectionController::class, 'showCollections']);

Route::get('admin/collections/{id}', [\App\Http\Controllers\CollectionController::class, 'readCollection']);*/

// комментарии
