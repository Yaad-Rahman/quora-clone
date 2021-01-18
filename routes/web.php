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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/profile/{user:name}', 'ProfileController@show')->name('profile');
    Route::get('/profile/{user:name}/edit', 'ProfileController@edit')->name('profile.edit');
    Route::post('/profiles/{user:name}/follow', 'FollowsController@store')->name('follow');
});

