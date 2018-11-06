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
Route::get('/', 'MainController@index');
Route::get('/heatmap', 'MainController@heatmap');
Route::get('/about', 'MainController@about');
Route::get('/help', 'MainController@help');

Route::post('/visitor', 'VisitorController@store');
Route::post('/symptoms', 'SymptomsController@store');


