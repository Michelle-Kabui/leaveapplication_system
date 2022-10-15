<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;


Route::get('/',function(){
    return view('home');
})->name('home');


Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')
->name('dashboard')
;

Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@index')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@store');

Route::get('/login', 'App\Http\Controllers\Auth\LoginController@index')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@store');

Route::post('/logout', 'App\Http\Controllers\Auth\LogoutController@store')->name('logout');

Route::get('/posts', 'App\Http\Controllers\PostController@index')->name('posts');
Route::post('/posts', 'App\Http\Controllers\PostController@store');

