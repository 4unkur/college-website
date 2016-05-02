<?php

Route::post('auth/login', 'Auth\AuthController@authenticate');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect']
], function()
{
    Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
    Route::get('auth/logout', 'Auth\AuthController@getLogout');
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::get('auth/confirm/{email}/{code}', ['as' => 'auth.confirm', 'uses' => 'Auth\AuthController@confirm']);

    Route::get('', ['as' => 'index', 'uses' => function () {
        return view('front.index');
    }]);

    Route::get('news', ['as' => 'news.index', 'uses' => 'NewsController@index']);
    Route::get('news/{slug}', ['as' => 'news.show', 'uses' => 'NewsController@show']);

    Route::get('users', ['as' => 'user.index', 'uses' => 'UsersController@index']);
    Route::get('user/{slug}', ['as' => 'user.show', 'uses' => 'UsersController@show']);

    Route::get('staff', ['as' => 'staff.index', 'uses' => 'UsersController@staffList']);
    Route::get('staff/{slug}', ['as' => 'staff.show', 'uses' => 'UsersController@show']);

    Route::get('students', ['as' => 'student.index', 'uses' => 'UsersController@studentList']);
    Route::get('student/{slug}', ['as' => 'student.show', 'uses' => 'UsersController@show']);
    
    Route::get('examresult/{email}', ['as' => 'examresult.show', 'uses' => 'ExamResultsController@show', 'middleware' => 'auth']);

    Route::get('videocourses', ['as' => 'videocourse.index', 'uses' => 'VideoCoursesController@index']);
    Route::get('videocourse/{slug}', ['as' => 'videocourse.show', 'uses' => 'VideoCoursesController@show']);
    
    Route::group(
        [
            'prefix' => 'admin',
            'middleware' => 'admin',
            'namespace' => 'Admin',
        ], function() {

        Route::get('#', ['as' => '#', 'uses' => function() { return ''; }]);

        Route::get('',  ['as' => 'admin.dashboard', 'uses' => function () {
            return view('admin.index')->with(['header' => 'dashboard', 'subheader' => 'welcome']);
        }]);
        
        // News routes:
        Route::get('news', ['as' => 'admin.news.index', 'uses' => 'NewsController@index']);
        Route::get('news/create', ['as' => 'admin.news.create', 'uses' => 'NewsController@create']);
        Route::post('news/store', ['as' => 'admin.news.store', 'uses' => 'NewsController@store']);
        Route::get('news/{id}/edit', ['as' => 'admin.news.edit', 'uses' => 'NewsController@edit']);
        Route::put('news/{id}', ['as' => 'admin.news.update', 'uses' => 'NewsController@update']);
        Route::delete('news/{id}', ['as' => 'admin.news.destroy', 'uses' => 'NewsController@destroy']);
        Route::delete('news/delete/image/{id}', ['as' => 'admin.news.delete.image', 'uses' => 'NewsController@deleteImage']);

        // Page routes:
        Route::get('pages', ['as' => 'admin.page.index', 'uses' => 'PagesController@index']);
        Route::get('page/create', ['as' => 'admin.page.create', 'uses' => 'PagesController@create']);
        Route::post('page/store', ['as' => 'admin.page.store', 'uses' => 'PagesController@store']);
        Route::get('page/{id}/edit', ['as' => 'admin.page.edit', 'uses' => 'PagesController@edit']);
        Route::put('page/{id}', ['as' => 'admin.page.update', 'uses' => 'PagesController@update']);
        Route::delete('page/{id}', ['as' => 'admin.page.destroy', 'uses' => 'PagesController@destroy']);

        Route::get('users', ['as' => 'admin.user.index', 'uses' => 'UsersController@index']);
        Route::get('user/create', ['as' => 'admin.user.create', 'uses' => 'UsersController@create']);
        Route::get('user/{id}/edit', ['as' => 'admin.user.edit', 'uses' => 'UsersController@edit']);
        Route::get('user/{id}', ['as' => 'admin.user.show', 'uses' => 'UsersController@show']);
        Route::post('user/store', ['as' => 'admin.user.store', 'uses' => 'UsersController@store']);
        Route::put('user/{id}', ['as' => 'admin.user.update', 'uses' => 'UsersController@update']);
        Route::delete('user/{id}', ['as' => 'admin.user.destroy', 'uses' => 'UsersController@destroy']);
        Route::delete('user/delete/image/{id}', ['as' => 'admin.user.delete.image', 'uses' => 'UsersController@deleteImage']);
        
        Route::get('import', ['as' => 'admin.import.index', 'uses' => 'ImportController@index']);
        Route::get('import/examresult', ['as' => 'admin.import.examresult', 'uses' => 'ImportController@examresult']);

        Route::get('examresults', ['as' => 'admin.examresult.index', 'uses' => 'ExamResultsController@index']);
        Route::post('examresult/store', ['as' => 'admin.examresult.store', 'uses' => 'ExamResultsController@store']);
        
        Route::get('videocourses', ['as' => 'admin.videocourse.index', 'uses' => 'VideoCoursesController@index']);
        Route::get('videocourse/create', ['as' => 'admin.videocourse.create', 'uses' => 'VideoCoursesController@create']);
        Route::post('videocourse/store', ['as' => 'admin.videocourse.store', 'uses' => 'VideoCoursesController@store']);
        Route::get('videocourse/{id}/edit', ['as' => 'admin.videocourse.edit', 'uses' => 'VideoCoursesController@edit']);
        Route::put('videocourse/{id}/update', ['as' => 'admin.videocourse.update', 'uses' => 'VideoCoursesController@update']);
        Route::delete('videocourse/destroy/{id}', ['as' => 'admin.videocourse.destroy', 'uses' => 'VideoCoursesController@destroy']);
        Route::delete('videocourse/delete/file/{id}', ['as' => 'admin.videocourse.delete.file', 'uses' => 'VideoCoursesController@deleteFile']);

    });
    Route::get('{slug}', ['as' => 'page.show', 'uses' => 'PagesController@show']);
});



