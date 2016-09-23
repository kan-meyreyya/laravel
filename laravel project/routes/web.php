<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('admin','AdminController');

Route::resource('user','UserController');

Route::get('userlist','UserController@getList');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('media','MediaController');
