<?php

// Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Authentification
Route::auth();

Route::group(['middleware' => ['auth', 'tenant']], function () {
    // Home | After Login
    Route::get('/home', 'HomeController@index');

    // Administration
    Route::get('/admin', 'Admin\UserController@home');
    Route::get('/admin/users/create', 'Admin\UserController@create');
    Route::post('admin/users', 'Admin\UserController@store');
    Route::put('/admin/users/{id}', 'Admin\UserController@updateUser');
    Route::get('/admin/users/{id}', 'Admin\UserController@show');
    Route::get('/admin/users/{id}/edit', 'Admin\UserController@edit');
    Route::delete('/admin/users/{id}', 'Admin\UserController@destroy');
    


    // Vue JS Calls
    Route::get('admin/fetchUsers', 'Admin\UserController@fetchUsers');
});
