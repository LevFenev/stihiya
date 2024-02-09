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

Route::get('poems', [\App\Http\Controllers\PoemController::class, 'showPoems']);

Route::get('poems/{id}', [\App\Http\Controllers\PoemController::class, 'readPoem']); // отсюда получает id

Route::get('comments/delete/{id}', [\App\Http\Controllers\CommentController::class, 'deleteComment']);

Route::get('users', [\App\Http\Controllers\UserController::class, 'showUsers']);

Route::get('users/{id}', [\App\Http\Controllers\UserController::class, 'showUserComments']); // отсюда получает id (string $id)

Route::get('collections', [\App\Http\Controllers\CollectionController::class, 'showCollections']);

Route::get('collections/{id}', [\App\Http\Controllers\CollectionController::class, 'readCollection']);
