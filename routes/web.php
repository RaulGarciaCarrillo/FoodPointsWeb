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

Route::get('/', function () {
    return view('landingPage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/foodType', 'foodTypeController@get')->name('foodType');

Route::get('/profile/{id}', 'UserController@show');

Route::get('/place/{id}', 'PlaceController@show');


Route::get('/favorite/{id}', 'FavoriteController@show');

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/place', function () {
    return view('place');
});

Route::get('/addPlace', function () {
	return view('addPlace');
});

Route::get('/favorite', function () {
    return view('favorite');
});

Route::post('/addPlace/{place}', 'PlaceController@create');