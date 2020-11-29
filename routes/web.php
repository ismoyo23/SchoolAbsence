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
Route::get('/absenceGet/{nip}', 'AbsenceController@show');
Route::get('/change', 'AbsenceController@edit');
Route::get('/user', 'AuthController@user');
Route::get('/deleteUser/{id}', 'AuthController@destroy');
Route::get('/createAbsence/{nip}/{majors}/{class}/{letter}', 'AbsenceController@create');
Route::get('/absence/{nip}', 'AbsenceController@create');
Route::post('/ProcessLogin', 'AuthController@store');
Route::get('/print', 'AbsenceController@print');

Route::get('/seeUser/{nik}', 'AuthController@seeUser');

// absen guru
Route::get('/absenceTeacher', 'AbsenceTeacherController@index');
Route::get('/absencePostApi/{code}/{nik}/{class}/{jam}/{materi}', 'AbsenceTeacherController@create');



// room router
Route::get('/ApiRoom', 'RoomController@indexAPI');
Route::get('/getRoom', 'RoomController@index');


// Jurnal Maanger
Route::get('/jurnalManager', 'JurnalManagerController@index');
Route::post('/prosesJurnal', 'JurnalManagerController@create');


// Upload semester

Route::get('/uploadSemester', 'uploadSemesterController@index');