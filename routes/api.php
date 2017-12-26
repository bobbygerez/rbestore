<?php


Route::post('auth/register', 'API\UserController@register');
Route::post('auth/login', 'API\UserController@login');
Route::get('auth/logout', 'API\UserController@logout');
Route::get('subcategory/{category_id}', 'API\UserSubCategoryController@categoryId');
Route::get('categories', 'API\APICategoryController@index');
Route::get('categories/{id}/subcategories', 'API\APICategoryController@getSubCategory');
Route::post('further_categories', 'API\APICategoryController@furtherCategories');
Route::get('items', 'API\APIItemsController@index');
Route::get('province', 'Province\ProvinceController@index');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'API\UserController@getAuthUser');
});

