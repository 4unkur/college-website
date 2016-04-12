<?php


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect']
], function()
{
    Route::get('', function () {
        return view('front.layouts.index');
    });

    Route::resource('page', 'PagesController');

    Route::get('news', ['as' => 'news.index', 'uses' => 'NewsController@index']);
    Route::get('news/{slug}', ['as' => 'news.show', 'uses' => 'NewsController@show']);

    Route::get('page/{slug}', ['as' => 'page.show', 'uses' => 'PagesController@show']);

    Route::get('user/{id}/recipes', ['as' => 'user.recipes', 'uses' => 'UsersController@recipes']);
    Route::get('user/{id}', ['as' => 'user.show', 'uses' => 'UsersController@show']);
    Route::get('users', ['as' => 'users.index', 'uses' => 'UsersController@index']);


    Route::group(
        [
            'prefix' => 'admin',
            'middleware' => 'admin',
            'namespace' => 'Admin',
        ], function() {

        Route::get('',  ['as' => 'admin.dashboard', 'uses' => function () {
            return view('admin.master');
        }]);
        
        // Remove image:
        Route::delete('delete-image/{id}', ['as' => 'admin.delete.image', 'uses' => 'NewsController@deleteImage']);

        // News routes:
        Route::get('news', ['as' => 'admin.news.index', 'uses' => 'NewsController@index']);
        Route::get('news/create', ['as' => 'admin.news.create', 'uses' => 'NewsController@create']);
        Route::post('news/store', ['as' => 'admin.news.store', 'uses' => 'NewsController@store']);
        Route::get('news/{id}/edit', ['as' => 'admin.news.edit', 'uses' => 'NewsController@edit']);
        Route::put('news/{id}', ['as' => 'admin.news.update', 'uses' => 'NewsController@update']);
        Route::delete('news/{id}', ['as' => 'admin.news.destroy', 'uses' => 'NewsController@destroy']);

        // Page routes:
        Route::get('pages', ['as' => 'admin.page.index', 'uses' => 'PagesController@index']);
        Route::get('page/create', ['as' => 'admin.page.create', 'uses' => 'PagesController@create']);
        Route::post('page/store', ['as' => 'admin.page.store', 'uses' => 'PagesController@store']);
        Route::get('page/{id}/edit', ['as' => 'admin.page.edit', 'uses' => 'PagesController@edit']);
        Route::put('page/{id}', ['as' => 'admin.page.update', 'uses' => 'PagesController@update']);
        Route::delete('page/{id}', ['as' => 'admin.page.destroy', 'uses' => 'PagesController@destroy']);

        Route::resource('user', 'UsersController', ['except' => 'index']);
        Route::get('users', ['as' => 'admin.users.index', 'uses' => 'UsersController@index']); //TODO: check this for controller namespace

    });
});

Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/confirm/{email}/{code}', ['as' => 'auth.confirm', 'uses' => 'Auth\AuthController@confirm']);

