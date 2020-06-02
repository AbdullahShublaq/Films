<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Config::set('auth.defines', 'admin');

    Route::get('login', 'AuthController@showLoginForm')->name('admin.login');
    Route::post('login', 'AuthController@login');
    Route::any('logout', 'AuthController@logout')->name('admin.logout');

    Route::group(['middleware' => 'adminAuth:admin'], function () {

        Route::get('/dashboard', function () {
            return view('admin.home');
        });

    });
});