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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/save_participante','HomeController@store');


Route::get('/show_participante/{id_participante}','HomeController@show');
Route::get('/participantes','HomeController@parts');
Route::post('/editar_participante','HomeController@update');
Route::get('/sendEmail/{id_participante}','HomeController@senMail');
