<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::get('/', 'HomeController@index');
    Route::get('/story/{id}', [
        'as' => 'get-story',
        'uses' => 'PostController@story'
    ]);
    Route::get('/posts', [
        'middleware' => ['auth', 'owner'],
        'uses' => 'PostController@index'
    ]);
    Route::any('/post/{id?}', [
        'middleware' => ['auth', 'owner'],
        'as' => 'get-post-edit',
        'uses' => 'PostController@edit'
    ]);

    Route::get('/ajax/toggle-off/{id}', [
        'middleware' => ['auth', 'owner'],
        'uses' => 'AjaxController@toggleOff'
    ]);
    Route::get('/ajax/toggle-on/{id}', [
        'middleware' => ['auth', 'owner'],
        'uses' => 'AjaxController@toggleOn'
    ]);
    Route::get('/ajax/trash/{id}', [
        'middleware' => ['auth', 'owner'],
        'uses' => 'AjaxController@trash'
    ]);
    Route::get('/ajax/trash-comment/{id}', [
        'middleware' => 'auth',
        'uses' => 'AjaxController@trashComment'
    ]);
    Route::get('/ajax/toggle-comment-off/{id}', [
        'middleware' => ['auth', 'owner'],
        'uses' => 'AjaxController@toggleCommentOff'
    ]);
    Route::get('/ajax/toggle-comment-on/{id}', [
        'middleware' => ['auth', 'owner'],
        'uses' => 'AjaxController@toggleCommentOn'
    ]);

    Route::post('/ajax/comment', [
        'middleware' => 'auth',
        'uses' => 'AjaxController@comment'
    ]);

    Route::get('/users', [
        'middleware' => ['auth', 'owner'],
        'uses' => 'HomeController@users'
    ]);
    Route::get('/ajax/user-remove/{id}', [
        'middleware' => ['auth', 'owner'],
        'uses' => 'AjaxController@userRemove'
    ]);
});

Route::group(['middleware' => 'web'], function () {
    Route::get('/login', 'Auth\AuthController@getLogin');
    Route::post('/login', 'Auth\AuthController@postLogin');
});