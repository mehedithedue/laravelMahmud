<?php


Route::get('/', 'FrontEndController@index')->name('front');


Route::get('/xion-alter/clear-cache', 'FrontEndController@clearCache');

Route::get('/get-portfolio-item', 'FrontEndController@getPortfolioItem');

Route::group(['middleware' => ['web','auth']], function() {

    Route::get('/home', 'HomeController@index')->name('home');
});


Route::get('login/sultan', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login/sultan', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
