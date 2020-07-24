<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'UiController@index') -> name('welcome');
Route::post('/ui_apartments', 'UiController@show_ui_apartments') -> name('ui_apartments');
Route::get('/ui_apartments', 'UiController@error') -> name('ui_apartments');
Route::post('/ui_filtered_apt', 'UiController@filter_ui_apartments') -> name('ui_filtered_apt');
Route::get('/ui_filtered_apt', 'UiController@error') -> name('ui_filtered_apt');
Route::get('/ui_apartment/{id}', 'UiController@show_ui_apartment') -> name('ui_apartment');
Route::post('/send_message/{id}', 'UiController@send_message_upra') -> name('send_message_upra');
Route::get('/send_message/{id}', 'UiController@error') -> name('send_message_upra');
Route::get('/new_view/{id}', 'UiController@create_view')->name('create_view');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create_apartment', 'UserController@create')->name('create_apartment');
Route::post('/store_apartment', 'UserController@store')->name('store_apartment');
Route::get('/store_apartment', 'UserController@error')->name('store_apartment');
Route::get('/edit_apartment/{id}', 'UserController@edit')->name('edit_apartment');
Route::post('/update_apartment/{id}', 'UserController@update')->name('update_apartment');
Route::get('/update_apartment/{id}', 'UserController@error')->name('update_apartment');
Route::get('/user_apartments', 'UserController@show_apartments')->name('user_apartments');
Route::get('/show_upra_apartment/{id}', 'UserController@show_upra_apartment')->name('show_upra_apartment');
Route::get('/delete_apartment/{id}', 'UserController@delete_apartment')->name('delete_apartment');
Route::get('/show_messages', 'UserController@show_messages')->name('show_messages');
Route::get('/show_statistics/{id}', 'UserController@show_statistics')->name('show_statistics');
Route::post('/sponsorship_pay/{id}', 'UserController@sponsorship_pay')->name('sponsorship_pay');
Route::get('/sponsorship_pay/{id}', 'UserController@error')->name('sponsorship_pay');
Route::get('/successo/{data}', 'UserController@result_payment')->name('result_payment');


//******* Prova rotte per api *******//
Route::get('/welcome_show', 'ApiController@welcome_show')->name('welcome_show');
Route::get('/token_generate', 'ApiController@token_generate')->name('token_generate');
Route::post('/payment', 'ApiController@payment')->name('payment');
Route::get('/payment', 'ApiController@error')->name('payment');
Route::get('/first_search', 'ApiController@first_search')->name('first_search');
