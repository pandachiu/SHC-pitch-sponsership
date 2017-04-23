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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    //return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/sponsor', function () {
    return view('pitch');
});

Route::get('/pitch-section/{id}', 'PitchSectionController@display')->name('pitchSection');

Route::get('/addProduct/{productId}', 'BasketController@addItem');
Route::get('/removeItem/{productId}', 'BasketController@removeItem');
Route::get('/basket', 'BasketController@show');

Route::auth();

Route::get('/home', 'HomeController@index');
