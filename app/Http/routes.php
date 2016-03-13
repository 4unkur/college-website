<?php


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]
], function()
{
    Route::get('', function () {
        return view('layouts.index');
    });

    Route::resource('page', 'PagesController');

    Route::resource('news', 'NewsController', ['only' => ['index', 'show']]);

    Route::get('user/{id}/recipes', ['as' => 'user.recipes', 'uses' => 'UsersController@recipes']);
    Route::get('user/{id}', ['as' => 'user.show', 'uses' => 'UsersController@show']);
    Route::get('users', ['as' => 'users.index', 'uses' => 'UsersController@index']);

    Route::resource('recipe', 'RecipesController', ['except' => ['index', 'destroy']]);
    Route::get('recipes', ['as' => 'recipes.index', 'uses' => 'RecipesController@index']);

    Route::group(
        [
            'prefix' => 'admin',
            'middleware' => 'admin',
            'namespace' => 'Admin',
        ], function() {

        Route::get('',  ['as' => 'admin.dashboard', 'uses' => function () {
            return view('admin.master');
        }]);
        Route::resource('news', 'NewsController');
        Route::resource('pages', 'PagesController');
        Route::resource('user', 'UsersController', ['except' => 'index']);
        Route::get('users', ['as' => 'admin.users.index', 'uses' => 'UsersController@index']); //TODO: check this for controller namespace
        Route::resource('recipe', 'RecipesController', ['except' => 'index']);
        Route::get('recipes', ['as' => 'admin.recipes.index', 'uses' => 'RecipesController@index']);//TODO: check this for controller namespace

        Menu::make('leftSidebarMenu', function($menu) {
            $menu->add('Home', ['route' => 'admin.dashboard']);
            $menu->add('News', ['class' => 'treeview']);
//            $menu->news->add('List', ['action' => 'admin.news.index']);
//            $menu->news->add('Add', ['route' => 'admin.news.create']);
        });
    });
});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

