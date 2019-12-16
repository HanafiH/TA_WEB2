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

Route::get('/', 'SiteController@home');
Route::get('/about', 'SiteController@about');
Route::get('/register','SiteController@register');
Route::post('/postregister','SiteController@postRegister');

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postLogin');
Route::get('logout','AuthController@logout');


Route::group(['middleware' => ['auth','CheckRole:admin']],function(){
    Route::get('/siswa','SiswaController@index');
    Route::post('/siswa/store','SiswaController@store');
    // route model binding
    Route::get('/siswa/{siswa}/edit','SiswaController@edit');
    Route::post('/siswa/{siswa}/update','SiswaController@update');
    Route::get('siswa/{id}/delete','SiswaController@delete');
    Route::get('/siswa/{id}/profile','SiswaController@profile');
    Route::post('/siswa/{id}/addnilai','SiswaController@addNilai');
    Route::get('/siswa/{id}/{idMapel}/deletenilai','SiswaController@deleteNilai');
    Route::get('/siswa/exportexcel','SiswaController@exportExcel');
    Route::get('/siswa/exportpdf','SiswaController@exportPDF');

    Route::get('/guru/{id}/profile','GuruController@profile');
});

Route::group(['middleware' => ['auth','CheckRole:admin,siswa']],function(){
    Route::get('/dashboard','DashboardController@index');

});
