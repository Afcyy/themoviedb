<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;


Route::get('/', 'App\Http\Controllers\MoviesController@index')->name('index');
Route::get('/movie/{movie}', 'App\Http\Controllers\MoviesController@show')->name('show');

Route::get('/actors', 'App\Http\Controllers\ActorsController@index')->name('actors.index');
Route::get('/actors/page/{page?}', 'App\Http\Controllers\ActorsController@index');
Route::get('/actors/{actor}', 'App\Http\Controllers\ActorsController@show')->name('actors.show');
