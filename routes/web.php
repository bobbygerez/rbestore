<?php

Route::get('/', function(){
	return view('index');
});
Route::resource('category', 'Category\CategoryController');

Route::resource('city', 'City\CityController');
