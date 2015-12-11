<?php

Route::get('', function () {
    return view('layouts.index');
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
        Route::resource('user', 'UsersController', ['except' => 'index']);
        Route::get('users', ['as' => 'admin.users.index', 'uses' => 'UsersController@index']); //TODO: check this for controller namespace
        Route::resource('recipe', 'RecipesController', ['except' => 'index']);
        Route::get('recipes', ['as' => 'admin.recipes.index', 'uses' => 'RecipesController@index']);//TODO: check this for controller namespace
    }
);

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::resource('page', 'PagesController');

Route::resource('news', 'NewsController', ['only' => ['index', 'show']]);

Route::get('user/{id}', ['as' => 'user.show', 'uses' => 'UsersController@show']);
Route::get('users', ['as' => 'users.index', 'uses' => 'UsersController@index']);