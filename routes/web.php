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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'BookController@index');
    /*User Controller*/
    Route::get('/users', 'UserController@index');
    /*Message Controller*/
    Route::get('/chat', 'MessageController@displayChat');
    Route::post('/send', 'MessageController@send');
    Route::get('/back', 'MessageController@back');
    /*Book Controller*/
    Route::get('/bookregister', 'BookController@registerPage');
    Route::post('/savebook', 'BookController@register');
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
