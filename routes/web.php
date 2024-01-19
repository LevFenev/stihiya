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

Route::get('poems', [\App\Http\Controllers\PoemController::class, 'myPage']);

Route::get('poems/{id}', [\App\Http\Controllers\PoemController::class, 'myPage2']); // по идее должно работать

Route::get('users', [\App\Http\Controllers\UserController::class, 'myPage']);

Route::get('collections', [\App\Http\Controllers\CollectionController::class, 'myPage2']);

Route::get('collections/{id}', [\App\Http\Controllers\PoemController::class, 'myPage2']);
