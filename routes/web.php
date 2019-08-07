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
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PostsController@index');
Route::post('/', 'PostsController@store');
Route::delete('/posts/{post}','PostsController@destroy');
Route::patch('/posts/{post}','PostsController@update');
Route::get('/posts/{post}','PostsController@destroy');
Route::patch('/{request}','PostsController@done');
Route::post('/{request}','FriendsController@store');
Route::delete('/{request}','FriendsController@destroy');
