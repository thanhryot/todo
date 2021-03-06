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

Route::get('/', "FrontendController\HomeController@index")->name('home');


Route::get('/login', "AuthController\LoginController@index")->name('login-index');
Route::post('/login', "AuthController\LoginController@login")->name('login');

Route::get('/signup', "AuthController\SignupController@index")->name('signup-index');
Route::post('/signup', "AuthController\SignupController@signup")->name('signup');

Route::get('/logout', "AuthController\LoginController@logout")->name('logout');

Route::middleware('auth')->group(function () {

	Route::resource('todos', 'ToDoListController');

	Route::post('/switch', "ToDoListController@switch")->name('todo.switch');

	Route::get('/activity', "ActivityController@index")->name('activity.index');

	Route::get('/favorite', "FavoriteController@index")->name('favorite.index');

	Route::get('/favorite/get', "FavoriteController@getToRedis")->name('favorite.get');

	Route::get('/favorite/set/{user_id}/{item}', "FavoriteController@setToRedis")->name('favorite.set');

	Route::get('/favorite/clear', "FavoriteController@clear")->name('favorite.clear');


});
