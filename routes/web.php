<?php


Route::get('/', 'FrontEndController@index')->name('front');


Route::get('/xion-alter/clear-cache', 'FrontEndController@clearCache');

Route::get('/get-portfolio-item', 'FrontEndController@getPortfolioItem');

Route::group(['middleware' => ['web','auth'], 'prefix' => 'admin-section'], function() {

    Route::get('/home', 'HomeController@index')->name('home');


});


Route::group(['prefix' => 'admin-section'], function() {

    Route::get('/image/upload', 'HomeController@image');

    Route::post('files/store/{type}', 'FilesController@store');
    Route::get('files/get', 'FilesController@getFile');
    Route::get('files/put','FilesController@putPicture');
    Route::resource('menu', 'Admin\MenuController');
    
});



Route::get('login/sultan', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login/sultan', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

