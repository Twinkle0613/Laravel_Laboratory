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

// Route::get('/', 'Auth\LoginController@login');

Route::get('/test','TestController@handle');
Route::get('/pay','PayOrderController@store');
Route::post('/book','BooksController@store');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/messages', 'ChatController@index')->name('messages')->middleware('auth');


Route::group(array('before' => 'auth'), function() { 


});
