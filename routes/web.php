<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'PageControl@index');
Route::get('/sort', 'QuestionsLogic@sort')->name('sort');


Route::resource('pages', 'PageControl');




Auth::routes();

Route::group(['middleware'=>'auth'], function() {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('questions','QuestionsController')->except(
    'show');
	Route::resource('categories','CategoriesController')->except(
    'show');
	Route::resource('users','UsersController')->except(
    'show');
});
