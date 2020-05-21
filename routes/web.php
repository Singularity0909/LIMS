<?php

Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('createReader', 'UsersController@createReader')->name('createReader');
Route::get('createAdmin', 'UsersController@createAdmin')->name('createAdmin');
Route::get('indexReaders', 'UsersController@indexReaders')->name('indexReaders');
Route::get('indexAdmins', 'UsersController@indexAdmins')->name('indexAdmins');
Route::resource('users', 'UsersController');
Route::get('createBook', 'BooksController@create')->name('createBook');
Route::get('indexBooks', 'BooksController@index')->name('indexBooks');
Route::resource('books', 'BooksController');
Route::get('createCategory', 'CategoriesController@create')->name('createCategory');
Route::get('indexCategories', 'CategoriesController@index')->name('indexCategories');
Route::resource('categories', 'CategoriesController');
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');
