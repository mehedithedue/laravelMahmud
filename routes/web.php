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

Route::get('/', 'HomeController@index');

Route::get('/task', 'TaskController@index');

Route::get('/{task}', 'TaskController@show');


Route::get('cards', 'CardControll@index');

Route::get('cards/{id}', 'CardControll@show');
