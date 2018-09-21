<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/admin'], 
    function() {
        Route::post('logout', 'Auth\LoginController@userLogout')->name('admin.logout');

        Route::group(['middleware' => 'auth'], function () {
            Route::get('', ['as' => 'admin.index', 
                'uses' => 'Cliente\HomeController@index']);
        });
        
});


Route::group(['prefix' => '/aluno'], 
    function() {
        
        Route::group(['middleware' => 'auth:student'], function () {
            Route::get('', ['as' => 'student.index', 
                        'uses' => 'Aluno\HomeController@index']);
        });
        
        Route::get('login', ['as' => 'student.login', 
                        'uses' => 'Auth\StudentLoginController@showLoginForm']);
        Route::post('login', ['as' => 'student.login.submit', 
                        'uses' => 'Auth\StudentLoginController@login']);

        Route::post('logout', 'Auth\StudentLoginController@logout')->name('student.logout');

        Route::post('password/email', 'Auth\StudentForgotPasswordController@sendResetLinkEmail')->name('student.password.email');
        Route::get('password/reset', 'Auth\StudentForgotPasswordController@showLinkRequestForm')->name('student.password.update');
        Route::post('password/reset', 'Auth\StudentResetPasswordController@reset');
        Route::get('password/reset/{token}', 'Auth\StudentResetPasswordController@showResetForm')->name('student.password.reset');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



