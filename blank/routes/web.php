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

Route::post('post/search/results/{search}', 'PostController@search');
Route::delete('post/profile/{user}', 'PostController@remove_friend');
Route::post('post/profile/{user}', 'PostController@add_friend');
Route::get('post/profile/{user}/friends', 'PostController@friends_list');
Route::get('post/profile/{user}', 'PostController@homepage');
Route::post('post/{post}', 'PostController@new_comment');
Route::delete('post/{post}/{id}', 'PostController@delete_comment');
Route::resource('post', 'PostController');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/er_diagram', function(){
    return view('posts.er_diagram');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
