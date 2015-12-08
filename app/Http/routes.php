<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'admin',
        'namespace' => 'Admin'
    ],
    function() {
        Route::get('',  'DashboardControler@index');
        Route::resource('news', 'NewsController');
    }
);

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');