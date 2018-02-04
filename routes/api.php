<?php


Route::post('auth/register', 'API\UserController@register');
Route::post('auth/login', 'API\UserController@login');
Route::get('auth/logout', 'API\UserController@logout');
// Route::get('start-up', 'API\APIItemsController@startUp');
Route::get('start-up', 'API\APICompanyController@allStores');
Route::get('subcategory/{category_id}', 'API\UserSubCategoryController@categoryId');
Route::get('categories', 'API\APICategoryController@index');
Route::post('categories/selection', 'API\APICategoryController@getSubCategory');
Route::post('further_categories', 'API\APICategoryController@furtherCategories');
Route::get('items', 'API\APIItemsController@index');
Route::get('item/details/{uuid}', 'API\APIItemsController@getItemDetails');
Route::post('items/further_categories', 'API\APIItemsController@furtherCategories');
Route::get('province', 'Province\ProvinceController@index');
Route::post('city/province', 'City\CityController@getCities');
Route::post('barangay/city', 'Barangay\BarangayController@getBarangays');
Route::post('barangay/items', 'Barangay\BarangayController@getItems');
Route::get('sample', 'API\APIItemsController@getSample');
Route::get('user/{uuid}', 'API\UserController@getUserInfo');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'API\UserController@getAuthUser');
});

