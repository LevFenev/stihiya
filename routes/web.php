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

Route::get('/poems/{id}', [\App\Http\Controllers\PoemController::class, 'readPoem']); // отсюда получает id

Route::get('/poems/post/{new_id}', [\App\Http\Controllers\PoemController::class, 'getPoem']);

Route::post('/poems/post', [\App\Http\Controllers\PoemController::class, 'postPoem']);

// СБОРНИКИ
Route::get('collections', [\App\Http\Controllers\CollectionController::class, 'showCollections']);

Route::get('collections/{id}', [\App\Http\Controllers\CollectionController::class, 'readCollection']);


// КОММЕНТАРИИ
Route::get('comment/delete/{id}', [\App\Http\Controllers\CommentController::class, 'deleteComment']);

Route::get('comment/post/{poem_id}', [\App\Http\Controllers\CommentController::class, 'getComment']); // отвечает за форму

Route::post('comment/post', [\App\Http\Controllers\CommentController::class, 'postComment']); // отвечает за публикацию и т.д.

//Route::get('comment/trashed', [\App\Http\Controllers\CommentController::class, 'showTrashedComments']);

//Route::get('comment/restore/{id}', [\App\Http\Controllers\CommentController::class, 'restoreComment']);

// ПОЛЬЗОВАТЕЛЬ
Route::get('users', [\App\Http\Controllers\UserController::class, 'showUsers']);

Route::get('users/{id}', [\App\Http\Controllers\UserController::class, 'showUserComments']); // отсюда получает id (string $id)

// АДМИНСКАЯ

// стихи
Route::get('admin/poems', [\App\Http\Controllers\PoemController::class, 'admin_showPoems']);

/*Route::get('admin/poems/{id}', [\App\Http\Controllers\PoemController::class, 'readPoem']); // отсюда получает id*/

Route::get('admin/poems/delete/{id}', [\App\Http\Controllers\CommentController::class, 'deletePoem']);

// сборники
/*
Route::get('admin/collections', [\App\Http\Controllers\CollectionController::class, 'showCollections']);

Route::get('admin/collections/{id}', [\App\Http\Controllers\CollectionController::class, 'readCollection']);*/

// комментарии
Route::get('admin/comment/delete/{id}', [\App\Http\Controllers\CommentController::class, 'deleteComment']);

Route::get('admin/comment/trashed', [\App\Http\Controllers\CommentController::class, 'showTrashedComments']);

Route::get('admin/comment/restore/{id}', [\App\Http\Controllers\CommentController::class, 'restoreComment']);

// пользователи
Route::get('admin/users', [\App\Http\Controllers\UserController::class, 'showUsers']);

Route::get('admin/users/{id}', [\App\Http\Controllers\UserController::class, 'showUserComments']);
