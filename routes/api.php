<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['api']], function(){
  Route::resource('user', 'UserController', ['except' => ['create', 'edit']]);
});

Route::get('book/entry/{id}', 'BookController@entry');

Route::group(['middleware' => ['api']], function(){
    Route::resource('book', 'BookController', ['except' => ['create', 'edit']]);
});