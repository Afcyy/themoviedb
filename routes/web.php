<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;


Route::get('/', 'App\Http\Controllers\MoviesController@index')->name('index');
Route::get('/movie/{id}', 'App\Http\Controllers\MoviesController@show')->name('show');

Route::get('/actors', 'App\Http\Controllers\ActorsController@index')->name('actors.index');
Route::get('/actors/page/{id?}', 'App\Http\Controllers\ActorsController@index');
Route::get('/actors/{id}', 'App\Http\Controllers\ActorsController@show')->name('actors.show');

Route::get('/tv', 'App\Http\Controllers\TVController@index')->name('tv.index');
Route::get('/tv/{id}', 'App\Http\Controllers\TVController@show')->name('tv.show');
