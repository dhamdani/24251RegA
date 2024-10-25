<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [FirebaseController::class,'index']);
Route::get('/posts/create', [FirebaseController::class,'create']);
Route::post('/posts', [FirebaseController::class,'store']);
Route::get('/posts/{id}/edit', [FirebaseController::class,'edit']);
Route::put('/posts/{id}', [FirebaseController::class,'update']);
Route::delete('/posts/{id}', [FirebaseController::class,'destroy']);



