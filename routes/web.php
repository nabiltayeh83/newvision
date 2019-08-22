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
Route::get('/aboutus', 'HomePageController@aboutus')->name('aboutus');
Route::get('/contactus', 'HomePageController@contactus')->name('contactus');
Route::get('/category', 'HomePageController@category')->name('category');
Route::get('/order', 'HomePageController@order')->name('order');
Route::post('order', 'HomePageController@ordersave');
Route::get('/services/{id}', 'HomePageController@services')->name('services');
Route::get('/details/{id}', 'HomePageController@details')->name('details');




Route::prefix('admin')->name('admin.')->namespace('admin')->group(function(){

    Route::resource('sitesettings', 'SitesettingsController')->middleware('permission:Sitesettings');

    Route::get('categories/delete/{id}', 'CategoryController@destroy')->middleware('permission:Categories');
    Route::get('categories/active/{id}', 'CategoryController@active')->middleware('permission:Categories');
    Route::resource('categories', 'CategoryController')->middleware('permission:Categories');
    
    Route::get('services/active/{id}', 'ServiceController@active')->middleware('permission:Services');
    Route::get('services/delete/{id}', 'ServiceController@destroy')->middleware('permission:Services');
    Route::resource('services', 'ServiceController')->middleware('permission:Services');
    
    Route::get('pages/active/{id}', 'PagesController@active')->middleware('permission:Pages');
    Route::resource('pages', 'PagesController')->middleware('permission:Pages');
    
    Route::get('orders/delete/{id}', 'OrderController@destroy')->middleware('permission:Orders');
    Route::resource('orders', 'OrderController')->middleware('permission:Orders');
    
    Route::get('users/permission/{id}', 'UsersController@permission')->middleware('permission:Users');
    Route::post('users/permission/{id}', 'UsersController@setpermission')->middleware('permission:Users');
    Route::get('users/delete/{id}', 'UsersController@destroy')->middleware('permission:Users');
    Route::get('users/updateprofile', 'UsersController@updateprofile')->middleware('permission:Users');
    Route::put('users/updateprofile', 'UsersController@setupdateprofile')->middleware('permission:Users');
    Route::resource('users', 'UsersController')->middleware('permission:Users');
});



Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');



Route::fallback('HomePageController@index')->name('FallBack');
