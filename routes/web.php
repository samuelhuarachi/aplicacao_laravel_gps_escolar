<?php

Route::get('/', function () {
    return view('welcome');
});


Route::get('pagseguro/redirect', ['as' => 'pagseguro.redirect', 
        'uses' => 'Cliente\Pagseguro@redirect']);

Route::post('pagseguro/notification', ['as' => 'pagseguro.notification', 
        'uses' => 'Cliente\Pagseguro@notification']);

Route::group(['prefix' => '/admin'],
    function() {
        Route::post('logout', 'Auth\LoginController@userLogout')->name('admin.logout');

        // *** AUTH
        Route::group(['middleware' => 'auth'], function () {

            // *** INDEX
            Route::get('', ['as' => 'admin.index', 
                'uses' => 'Cliente\HomeController@index']);

            // *** VEHICLE
            Route::group(['prefix' => '/vehicles'], function () {
                Route::get('', ['as' => 'admin.vehicle.index', 
                    'uses' => 'Cliente\VehicleController@index']);

                Route::post('', ['as' => 'admin.vehicle.new', 
                    'uses' => 'Cliente\VehicleController@new']);
                
                Route::get('{id}/attach/driver', [   
                    'as'   => 'admin.vehicle.driver.new', 
                    'uses' => 'Cliente\VehicleController@newDriver'
                ]);

                Route::get('{vehicle}/attach/driver/{driver}', [
                    'as'   => 'admin.vehicle.attach.driver', 
                    'uses' => 'Cliente\VehicleController@attachDriver'
                ]);
                
                Route::get('{vehicle}/detach/driver/{driver}', [
                    'as'   => 'admin.vehicle.detach.driver', 
                    'uses' => 'Cliente\VehicleController@detachDriver'
                ]);

                Route::get('{vehicle}/shift/add', [
                    'as'   => 'admin.vehicle.shift.add', 
                    'uses' => 'Cliente\VehicleController@addShift'
                ]);

                Route::post('shift/new', [
                    'as'   => 'admin.vehicle.shift.new', 
                    'uses' => 'Cliente\VehicleController@newShift'
                ]);

                Route::get('{vehicle}/shift/{shift}/delete', [
                    'as'   => 'admin.vehicle.shift.delete', 
                    'uses' => 'Cliente\VehicleController@deleteShift'
                ]);

                Route::get('shift/{shift}/edit', [
                    'as'   => 'admin.vehicle.shift.edit', 
                    'uses' => 'Cliente\VehicleController@editShift'
                ]);
                
                Route::put('shift/update', [
                    'as'   => 'admin.vehicle.shift.update', 
                    'uses' => 'Cliente\VehicleController@updateShift'
                ]);

                Route::get('{vehicle}/edit', [
                    'as'   => 'admin.vehicle.edit', 
                    'uses' => 'Cliente\VehicleController@edit'
                ]);

                Route::put('update', [
                    'as'   => 'admin.vehicle.update', 
                    'uses' => 'Cliente\VehicleController@update'
                ]);

                Route::get('{vehicle}/delete', [
                    'as'   => 'admin.vehicle.delete', 
                    'uses' => 'Cliente\VehicleController@delete'
                ]);
            });
            
            // *** DRIVERS
            Route::group(['prefix' => '/drivers'], function () {
                Route::get('', ['as' => 'admin.driver.index', 
                    'uses' => 'Cliente\DriverController@index']);

                    Route::get('add', ['as' => 'admin.driver.add', 
                        'uses' => 'Cliente\DriverController@add']);

                    Route::post('', ['as' => 'admin.driver.new', 
                        'uses' => 'Cliente\DriverController@new']);
                        
            });

            // *** STUDENTS
            Route::group(['prefix' => '/students'], function () {
                Route::get('', ['as' => 'admin.student.index', 
                    'uses' => 'Cliente\StudentController@index']);

                Route::get('add', ['as' => 'admin.student.add', 
                    'uses' => 'Cliente\StudentController@add']);

                Route::post('add', ['as' => 'admin.student.new', 
                    'uses' => 'Cliente\StudentController@new']);
            });
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



