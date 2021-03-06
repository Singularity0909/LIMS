<?php

Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

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

Route::get('borrow', 'LentController@create')->name('createLent');
Route::get('indexLent', 'LentController@index')->name('indexLent');
Route::resource('lent', 'LentController');

Route::get('return', 'ReturnedController@create')->name('createReturned');
Route::get('indexReturned', 'ReturnedController@index')->name('indexReturned');
Route::resource('returned', 'ReturnedController');

Route::resource('records', 'RecordsController');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
