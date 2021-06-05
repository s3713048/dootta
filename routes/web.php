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

// user profile
Route::get('user/profile', 'UserController@index');

// user authentication
Route::get('user/login', function () {
    return view('user.login');
});
Route::post('user/login', 'UserController@login');
Route::get('user/logout', 'UserController@logout');

// user creation
Route::get('user/register', function () {
    return view('user.register');
});
Route::post('user/register', 'UserController@register');

// hero
Route::get('/heros', 'HeroController@index');
Route::get('/heros/{heroId}', 'HeroController@detail');

// players
Route::get('/players', 'PlayerController@index');
Route::get('/teams/{teamId}', 'PlayerController@team');