<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

Route::resource('user', 'UserController');
Route::resource('posts', 'PostController');
//Route::resource('comment', 'CommentController');
Route::post('posts/{postId}/comments', 'CommentController@store')->where(['postId' => '[0-9]+'])->name('comment.store');