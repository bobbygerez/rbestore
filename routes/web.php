<?php

Route::get('/', function(){
	return view('index');
});
Route::resource('category', 'Category\CategoryController');
Route::resource('subcategory', 'SubCategory\SubCategoryController');
Route::resource('city', 'City\CityController');


// Route::get('/socialite/{facebook}', 'SocialAuthFacebookController@redirect');
// Route::get('/callback', 'SocialAuthFacebookController@callback');
