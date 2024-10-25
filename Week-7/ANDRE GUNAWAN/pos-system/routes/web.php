<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [FirebaseController::class, 'index']); // View all posts
Route::get('/posts/create', [FirebaseController::class, 'create']); // Show form to create a new post
Route::post('/posts', [FirebaseController::class, 'store']); // Handle form submission
Route::get('/posts/{id}/edit', [FirebaseController::class, 'edit']); // Show form to edit an existing post
Route::put('/posts/{id}', [FirebaseController::class, 'update']); // Handle update submission
Route::delete('/posts/{id}', [FirebaseController::class, 'destroy']); // Delete a post