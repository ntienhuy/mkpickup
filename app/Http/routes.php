<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::get('showRoute','ShowRouteController@index');
Route::get('booking','BookingController@index');
Route::post('booking','BookingController@book');
Route::get('manage','Manage\ManageController@index');
Route::post('manage/add','Manage\ManageController@add');
Route::post('manage/del','Manage\ManageController@del');
Route::post('manage/update','Manage\ManageController@update');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
