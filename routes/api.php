<?php


Route::post('auth/register', 'API\UserController@register');
Route::post('auth/login', 'API\UserController@login');
Route::get('auth/logout', 'API\UserController@logout');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'API\UserController@getAuthUser');
});