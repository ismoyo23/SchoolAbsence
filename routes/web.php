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

Route::get('/', 'AuthController@index');
Route::get('/Logout','AuthController@logout');
Route::get('/Admin', 'HomeController@index');
Route::get('/absence', 'AbsenceController@index');
Route::get('/change', 'AbsenceController@edit');
Route::get('/user', 'AuthController@user');
Route::get('/deleteUser/{id}', 'AuthController@destroy');

Route::get('/absence/{nip}', 'AbsenceController@create');
Route::post('/ProcessLogin', 'AuthController@store');
