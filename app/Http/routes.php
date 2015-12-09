<?php

Route::get('', function () {
    return view('layouts.master');
});

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'admin',
        'namespace' => 'Admin'
    ],
    function() {
        Route::get('',  function () {
            return view('admin.master');
        });
        Route::resource('news', 'NewsController');
        Route::resource('page', 'PagesController');
    }
);

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::resource('page', 'PagesController');

Route::resource('news', 'NewsController', ['only' => ['index', 'show']]);