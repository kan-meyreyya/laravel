<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('admin','AdminController');

Route::resource('user','UserController');