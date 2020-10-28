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

Route::resource('mos_web','Mos_webController');
Route::get('mos_data','Mos_webController@index2');
Route::resource('mos_gmap','My_googlmapcontroller');