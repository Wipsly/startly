<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::group(['middleware' => ['auth', 'tenant']], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/admin', 'Admin\UserController@index');
    Route::get('/admin/users/{id}', 'Admin\UserController@show');
    Route::get('/admin/users/{id}/edit', 'Admin\UserController@edit');

    // API Calls
    Route::get('admin/fetchUsers', 'Admin\UserController@fetchUsers');
    Route::get('admin/fetchUser/{id}', 'Admin\UserController@fetchUser');
    Route::patch('admin/updateUser/{id}', 'Admin\UserController@updateUser');
});
