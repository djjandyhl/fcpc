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

/*Route::group(['middleware' => ['fake.wechat', 'wechat.oauth']], function () {

});*/
//Route::get('init','HomeController@init');
Route::get('/', 'HomeController@home');
Route::post('/pc', 'HomeController@pc');
Route::get('backend','HomeController@backend');

