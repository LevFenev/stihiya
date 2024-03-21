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

Route::get('/', function () {
    return view('welcome');
});

// СТИХИ

Route::get('/poems', [\App\Http\Controllers\PoemController::class, 'showPoems']);

//Route::get('/poems/{id}', [\App\Http\Controllers\PoemController::class, 'readPoem']); // отсюда получает id

Route::get('/poems/{id}', [\App\Http\Controllers\PoemController::class, 'readPoem'])->name('poems'); // отсюда получает id

Route::get('admin/poems/trashed', [\App\Http\Controllers\PoemController::class, 'showTrashedPoems'])->name('trashedPoems');

Route::get('admin/poems/{id}', [\App\Http\Controllers\PoemController::class, 'admin_readPoem']);

Route::get('/poems/post/{new_id}', [\App\Http\Controllers\PoemController::class, 'getPoem']);

Route::post('/poems/post', [\App\Http\Controllers\PoemController::class, 'postPoem']);


Route::get('admin/poems/restore/{id}', [\App\Http\Controllers\PoemController::class, 'restorePoem']);

// СБОРНИКИ
Route::get('collections/{id}', [\App\Http\Controllers\CollectionController::class, 'readCollection']);

Route::get('collections', [\App\Http\Controllers\CollectionController::class, 'showCollections']);

Route::get('admin/collections/trashed', [\App\Http\Controllers\CollectionController::class, 'showTrashedCollections']);

Route::get('admin/collections', [\App\Http\Controllers\CollectionController::class, 'admin_showCollections']);

Route::get('admin/collections/{id}', [\App\Http\Controllers\CollectionController::class, 'admin_readCollection']);

Route::get('admin/collections/delete/{id}', [\App\Http\Controllers\CollectionController::class, 'deleteCollection']);


Route::get('admin/collections/restore/{id}', [\App\Http\Controllers\CollectionController::class, 'restoreCollection']);

// АЛЬБОМЫ
Route::get('albums', [\App\Http\Controllers\AlbumController::class, 'showAlbums']);

Route::get('admin/albums', [\App\Http\Controllers\AlbumController::class, 'admin_showAlbums']);

Route::get('albums/read/{album_id}', [\App\Http\Controllers\AlbumController::class, 'readAlbum']); // без "/read"?

Route::get('admin/albums/read/{album_id}', [\App\Http\Controllers\AlbumController::class, 'admin_readAlbum']);

// КОММЕНТАРИИ
//Route::get('comments/delete/{id}', [\App\Http\Controllers\CommentController::class, 'deleteComment']);

Route::get('comments/post/{poem_id}', [\App\Http\Controllers\CommentController::class, 'getComment']); // отвечает за форму

Route::post('comments/post', [\App\Http\Controllers\CommentController::class, 'postComment']); // отвечает за публикацию и т.д.

//Route::get('comment/trashed', [\App\Http\Controllers\CommentController::class, 'showTrashedComments']);

//Route::get('comment/restore/{id}', [\App\Http\Controllers\CommentController::class, 'restoreComment']);

// ПОЛЬЗОВАТЕЛЬ
Route::get('users', [\App\Http\Controllers\UserController::class, 'showUsers']);

Route::get('users/{id}', [\App\Http\Controllers\UserController::class, 'showUserComments']); // отсюда получает id (string $id)

// АДМИНСКАЯ

// стихи
// сюда нужно poem restore

Route::get('admin/poems/delete/{id}', [\App\Http\Controllers\PoemController::class, 'deletePoem']);

Route::get('admin/poems', [\App\Http\Controllers\PoemController::class, 'admin_showPoems'])->name('poems');


// сборники
/*
Route::get('admin/collections', [\App\Http\Controllers\CollectionController::class, 'showCollections']);

Route::get('admin/collections/{id}', [\App\Http\Controllers\CollectionController::class, 'readCollection']);*/

// комментарии
Route::get('admin/comments/delete/{id}', [\App\Http\Controllers\CommentController::class, 'deleteComment']);

Route::get('admin/comments/trashed', [\App\Http\Controllers\CommentController::class, 'showTrashedComments']);

Route::get('admin/comments/restore/{id}', [\App\Http\Controllers\CommentController::class, 'restoreComment']);

// пользователи
Route::get('admin/users', [\App\Http\Controllers\UserController::class, 'admin_showUsers'])->name('admin_users');

Route::get('admin/users/{id}', [\App\Http\Controllers\UserController::class, 'showUserComments']);

Route::get('admin/users/delete/{id}', [\App\Http\Controllers\UserController::class, 'deleteUser']);



