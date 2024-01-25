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

Route::get('poems/{id}', [\App\Http\Controllers\PoemController::class, 'readPoem']); // по идее должно работать

Route::get('users', [\App\Http\Controllers\UserController::class, 'showUsers']);

// Route::get('users', [\App\Http\Controllers\PoemController::class, 'showUsersPoems']);

Route::get('collections', [\App\Http\Controllers\CollectionController::class, 'showCollections']);

Route::get('collections/{id}', [\App\Http\Controllers\CollectionController::class, 'readCollection']);
