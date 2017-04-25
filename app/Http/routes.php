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
Route::auth();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/sponsor', function () {
    return view('pitch');
})->name('sponsor');

Route::get('/pitch-section/{id}', 'PitchSectionController@display')->name('pitchSection');
Route::get('/square/{id}', 'SquareController@display')->name('square.display');
Route::post('/square/{id}', 'SquareController@addToBasket')->name('square.add');

Route::get('/removeItem/{productId}', 'BasketController@removeItem')->name('basket.removeItem');
Route::get('/basket', 'BasketController@show')->name('basket.display');