<?php


Route::post('auth/register', 'API\UserController@register');
Route::post('auth/login', 'API\UserController@login');
Route::get('auth/logout', 'API\UserController@logout');
Route::get('start-up', 'API\APIItemsController@index');
Route::get('subcategory/{category_id}', 'API\UserSubCategoryController@categoryId');
Route::post('category/{category_id}', 'API\APICategoryController@getItems');
Route::post('category/{catid}/subcategory/{subid}', 'API\APISubCategoryController@getItems');
Route::get('categories', 'API\APICategoryController@index');
Route::post('categories/selection', 'API\APICategoryController@getSubCategory');
Route::post('further_categories', 'API\APICategoryController@furtherCategories');
Route::get('items', 'API\APIItemsController@index');
Route::get('item/details/{uuid}', 'API\APIItemsController@getItemDetails');
Route::post('items/further_categories', 'API\APIItemsController@furtherCategories');
Route::post('item/search', 'API\APIItemsController@itemSearch');
Route::get('province', 'Province\ProvinceController@index');
Route::post('city/province', 'City\CityController@getCities');
Route::post('barangay/city', 'Barangay\BarangayController@getBarangays');
Route::post('barangay/items', 'Barangay\BarangayController@getItems');
Route::get('sample', 'API\APIItemsController@getSample');
Route::get('user', 'API\UserController@getUserInfo');

Route::get('companies', 'API\APICompanyController@allStores');
Route::get('companies/{company_id}', 'API\APICompanyController@getCompanies');
Route::get('company/{name}/{page}', 'API\APIBranchController@getProduct');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'API\UserController@getAuthUser');
});

