<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes(['reset' => FALSE]);
Route::any('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index');
Route::get('/search', 'HomeController@search');
Route::post('/message', 'HomeController@message');

Route::get('/movies', 'MovieController@index');
Route::get('/movies/{film}', 'MovieController@show');
Route::get('/actors', 'ActorController@index');
Route::get('/actors/{actor:name}', 'ActorController@show');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/user/profile', 'ClientController@profile');
    Route::put('/user/profile/{user}', 'ClientController@updateProfile');
    Route::get('/user/change_password', 'ClientController@changePasswordForm');
    Route::put('/user/change_password/{user}', 'ClientController@changePassword');
    Route::get('/user/favorites', 'ClientController@favorites');
    Route::get('/user/ratings', 'ClientController@ratings');
    Route::get('/user/reviews', 'ClientController@reviews');
    Route::get('/user/reviews', 'ClientController@reviews');

    Route::post('/user/addToFavorite/{film}', 'FavoriteController@store');
    Route::post('/user/removeFromFavorite/{film}', 'FavoriteController@destroy');

    Route::post('/user/rate/{film}', 'RateController@store');

    Route::post('/user/review/{film}', 'ReviewController@store');
    Route::delete('/user/review/{film}', 'ReviewController@destroy');
});