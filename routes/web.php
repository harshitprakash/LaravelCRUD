<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// returns the home page with all posts
Route::get('/index', PostController::class .'@index')->name('posts.index');
// returns the form for adding a post
Route::get('/posts/create', PostController::class . '@create')->name('posts.create');
// adds a post to the database
Route::post('/posts', PostController::class .'@store')->name('posts.store');
// returns a page that shows a full post
Route::get('/posts/{id}', PostController::class .'@show')->name('posts.show');
// returns the form for editing a post
Route::get('/posts/{id}/edit', PostController::class .'@edit')->name('posts.edit');
// updates a post
Route::put('/posts/{id}', PostController::class .'@update')->name('posts.update');
// deletes a post
Route::delete('/posts/{id}', PostController::class .'@destroy')->name('posts.destroy');
