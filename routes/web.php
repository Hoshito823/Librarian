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
    /*Display all books or searched Result*/
    Route::get('/', 'BookController@index');
    Route::post('/', 'BookController@index');
    /*User Controller*/
    Route::get('/users', 'UserController@index');
    /*Message Controller*/
    Route::get('/chat', 'MessageController@displayChat');
    Route::post('/send', 'MessageController@send');
    /*Book Controller*/
    Route::get('/bookregister', 'BookController@registerPage');
    Route::post('/savebook', 'BookController@register');
    Route::get('/back', 'BookController@back');
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
