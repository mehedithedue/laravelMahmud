<?php


Route::get('/', 'FrontEndController@index')->name('front');
Route::get('/xion-alter/clear-cache', 'FrontEndController@clearCache');
Route::get('/get-portfolio-item', 'FrontEndController@getPortfolioItem');
Route::get('login/sultan', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login/sultan', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');





Route::group(['middleware' => ['web','auth'], 'prefix' => 'admin-section'], function() {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/image/upload', 'HomeController@image');

    Route::post('files/store/{categoryId}/{type}', 'Admin\ImageController@storeImages');

    Route::get('category-json', 'Admin\CategoryController@indexJson')->name('category.index.json');
    Route::resource('category', 'Admin\CategoryController');

    Route::get('image-json', 'Admin\ImageController@indexJson')->name('image.index.json');
    Route::get('portfolio-image/{type}', 'Admin\ImageController@showPortfolioImage');
    Route::get('portfolio-image-json/{categoryId}/{type}', 'Admin\ImageController@portfolioImageJson');
    Route::delete('portfolio-image/{image}', 'Admin\ImageController@destroy');

    Route::get('upload-logo', 'Admin\ImageController@uploadLogo');
    Route::post('upload-logo-store', 'Admin\ImageController@storeLogo');

    Route::get('content-json', 'Admin\ContentController@indexJson')->name('content.index.json');
    Route::resource('content', 'Admin\ContentController');

});

Route::resource('content', 'Admin\\ContentController');