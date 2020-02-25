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
    return view('welcome');
});

Auth::routes(/*['verify' => true]*/);

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('home', function () {
    return view('home');
});

Route::resource('tasks', 'TaskController');

Route::get('/calculate', 'CalculateController@index')->name('calculate')->middleware('auth');

Route::get('calculate', function () {
    return view('calculate');
});

/*Route::get('calculated', function () {
    return view('calculated');
});