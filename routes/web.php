<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/edit', function () {
    return view('edit');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/create', function () {
    return view('user.create');
});

Route::resource('user', 'HelloControler');



