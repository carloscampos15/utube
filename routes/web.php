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

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('video', 'VideoController');
    Route::resource('video.comment', 'CommentController');
});

Route::post('/search', 'VideoController@searchVideos')->name('search');

Route::get('/video/{video}','VideoController@show')->name('video.show');