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
Route::get('/', 'HomeController@index')->name('home');
Route::redirect('/home', '/');
Route::get('/getVidMateri/{id}', 'PesertaController@getVidMateri')->middleware('auth');
Route::get('/view-materi/{id}', 'PesertaController@viewMateri');

Route::resource('user', 'UserController')->except(['create']);
Route::get('edit-fasilitas/{user}', 'UserController@edit_fasilitas')->name('user.edit-fasilitas');
Route::resource('materi', 'MateriController')->except(['create']);
Route::post('materiUpload', 'MateriController@handleUpload')->name('materi.handleUpload');
Route::patch('materiUpload', 'MateriController@handleUpload')->name('materi.handleUpload');
Route::resource('fasilitas', 'FasilitasController')->except(['create', 'destroy', 'show', 'update', 'edit']);

Auth::routes(['register' => false, 'password.request' => false]);
