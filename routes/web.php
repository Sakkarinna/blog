<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', [PostController::class, 'index']);
Route::get('/post/create', [PostController::class, 'create']);
Route::post('/store', [PostController::class, 'store']);
Route::get('/view/{id}', [PostController::class, 'show']);
Route::get('/edit/{id}', [PostController::class, 'edit']);
Route::get('/delete/{id}', [PostController::class, 'delete']);
Route::post('/update/{id}', [PostController::class, 'update']);


