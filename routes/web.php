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

Route::get('/home', 'AnimalController@index')->name('home');

Route::resource('animals', 'AnimalController');
Route::resource('comments', 'CommentController');


Route::get('/users', 'UserController@index');
Route::post('/users', 'UserController@togglePostRight')->name('users.togglePostRight');
