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

Route::get('/', 'HomePageController@index')->name('HomePage');
Route::get('/about', 'HomePageController@about')->name('aboutUs');
Route::get('/contactus', 'HomePageController@contactus')->name('contactUs');
Route::get('/category', 'HomePageController@category')->name('category');
Route::get('/order', 'HomePageController@order')->name('order');
Route::get('/services/{id}', 'HomePageController@services')->name('services');
Route::get('/details/{id}', 'HomePageController@details')->name('details');







Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



Route::fallback('HomePageController@index');
