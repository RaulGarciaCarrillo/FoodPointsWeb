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

Route::post('/profile/editar', 'UserController@editar');

Route::get('/place/{id}', 'PlaceController@show');

Route::get('/favorite/{id}', 'FavoriteController@show');

Route::get('/comments/{id}', 'CommentsController@show');


Route::get('/profile', function () {
    return view('profile');
})->middleware('auth');

Route::get('/place', function () {
    return view('place');
})->middleware('auth');

Route::get('/addPlace', function () {
	return view('addPlace');
})->middleware('auth');

Route::get('/favorite', function () {
    return view('favorite');
})->middleware('auth');

Route::get('/editPlace', function () {
    return view('editPlace');
})->middleware('auth');

Route::get('/viewPlace', function () {
    return view('viewPlace');
})->middleware('auth');

Route::post('/addPlace/add', 'PlaceController@create');

Route::get('/test', function() {
	return Auth::user()->id;
});

Route::post('/addPlace/{place}', 'PlaceController@create');

Route::post('/addPlace/add', 'PlaceController@create');

