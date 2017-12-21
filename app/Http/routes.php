<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/get_cates','CateController@getCateItems');

Route::post('/create_cates','CateController@makeCateItem');

Route::get('/test','CateController@test');

Route::get('/reg','UserController@reg');

Route::post('/reg','UserController@doReg');

Route::get('/login','UserController@login');

Route::post('/login','UserController@dologin');

Route::get('/logout','UserController@logout');

Route::get('/testLogin','UserController@testLogin')->middleware('login');

Route::get('/login_test','UserController@testLogin');
