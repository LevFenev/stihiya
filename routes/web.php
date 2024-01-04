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

Route::get('lesson', [\App\Http\Controllers\PoemController::class, 'myPage']);

Route::get('lesson', [\App\Http\Controllers\UserController::class, 'myPage']);

Route::get('lesson', [\App\Http\Controllers\CollectionController::class, 'myPage']);
