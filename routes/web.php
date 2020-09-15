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
// HOME
Route::get('/', 'HomeController@home')->name('home');

// PROFIL
Route::get('/profil', 'UserController@profil')->name('profil');
Route::post('/profil', 'UserController@edit')->name('profil-post');

// PASSWORD
Route::get('/password', 'UserController@password')->name('password');
Route::post('/password', 'UserController@editPassword')->name('password-post');

// WORK
Route::get('/work','WorkController@add')->name('add-work');
Route::post('/add-work','WorkController@addWork')->name('add-work-post');

// AUTH
Auth::routes();
