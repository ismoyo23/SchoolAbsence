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
Route::get('/createAbsence/{nip}/{majors}/{class}/{letter}', 'AbsenceController@create');
Route::get('/absence/{nip}', 'AbsenceController@create');
Route::post('/ProcessLogin', 'AuthController@store');
Route::get('/print', 'AbsenceController@print');

Route::get('/seeUser/{nik}', 'AuthController@seeUser');

// absen guru
Route::get('/absenceTeacher', 'AbsenceTeacherController@index');
Route::get('/absencePostApi/{code}/{nik}/{class}/{jam}/{materi}/{status}', 'AbsenceTeacherController@create');
Route::get('/printTeacher', 'AbsenceTeacherController@show');



// room router
Route::get('/ApiRoom', 'RoomController@indexAPI');
Route::get('/getRoom', 'RoomController@index');


// Jurnal Mengajar
Route::get('/jurnalManager', 'JurnalManagerController@index');
Route::post('/prosesJurnal', 'JurnalManagerController@create');


// Upload semester

Route::get('/uploadSemester', 'uploadSemesterController@index');
Route::post('/uploadSemester', 'uploadSemesterController@store');
Route::get('/uploadSemesterDelete/{id}', 'uploadSemesterController@destroy');

// Perangkat Pembelajaran
Route::get('/uploadPembelajaran', 'LearningUploadController@index');

// Teacher data
Route::get('/user', 'AuthController@user');
Route::post('/addUser', 'AuthController@add');
Route::post('/import', 'AuthController@ImportUser');
Route::get('/deleteUser/{id}', 'AuthController@destroy');
Route::get('/deleteTeacher/{id}', 'AuthController@delete');
Route::get('/showDataTeacher/{id}', 'AuthController@showData');
Route::post('/updateDataTeacher', 'AuthController@update');


// Upload Code Class
Route::get('/uploadCodeClass', 'UploadCodeClassController@index');
Route::post('/uploadCodeClass', 'UploadCodeClassController@create');
Route::get('/DonwloadQR', 'UploadCodeClassController@show');
 
// Monitoring Teacher
Route::get('/MonitoringTeacher', 'MonitoringTeacherController@index');


// Orang Tua
Route::get('/ManageOrtu', 'ManageOrtuController@index');
Route::post('/ManageOrtu', 'ManageOrtuController@store');
Route::get('/ManageOrtuDelete/{id}', 'ManageOrtuController@destroy');
Route::get('/ManageOrtuShow/{id}', 'ManageOrtuController@show');
Route::post('/ManageOrtuUpdate/{id}', 'ManageOrtuController@update');


// Pantau Siswa
Route::get('/PantauSiswa', 'PantauSiswaController@index');


// Penilaian Siswa
Route::get('/PenilaianSiswa', 'PenilaianSiswaController@index');
Route::post('/PenilaianSiswa', 'PenilaianSiswaController@store');
Route::get('/PenilaianSiswa/{id}', 'PenilaianSiswaController@show');
Route::post('/PenilaianSiswaUpdate', 'PenilaianSiswaController@update');