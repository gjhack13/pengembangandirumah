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

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/pegawai', 'PegawaiController@index');
    Route::post('/pegawai/{id}/create', 'PegawaiController@create');
    Route::get('/pegawai/{id}/edit', 'PegawaiController@edit');
    Route::post('/pegawai/{id}/update', 'PegawaiController@update');
    Route::get('/pegawai/{id}/delete', 'PegawaiController@delete');
    Route::get('/pegawai/{id}/profile', 'PegawaiController@profile');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', 'DashboardController@index');
});
