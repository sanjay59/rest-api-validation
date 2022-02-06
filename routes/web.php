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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','RegisterController@index');
Route::get('login','RegisterController@login');
Route::get('register','RegisterController@register');
Route::post('save-user','RegisterController@store');
Route::post('check-user','RegisterController@checkuser');
Route::get('logout','RegisterController@logout');
Route::get('users','RegisterController@getusers');


