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

// NAVIGATION
Route::get('/', 'HomeController@index');
Route::get('/feed/{id}/{title}', 'HomeController@show');

// vue app
Route::get('/dashboard', function () { return view('dashboard'); });
Route::get('/dashboard/{any}', function () {
    return view('dashboard');
})->where('any', '.*');