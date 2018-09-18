<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/area-cliente', 'middleware' => 'auth'], 
function() {
    
    Route::get('/', ['as' => 'area-cliente.index', 
    'uses' => 'Cliente\HomeController@index']);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



