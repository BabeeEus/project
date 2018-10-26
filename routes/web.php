<?php


Route::get('/edit', function () {
	return view('edit');
});


Route::get('/index', function () {
	return view('user.index');
});
Route::get('/select', function () {
	return view('user.select');
});

Route::get('delete/{id}', 'HelloControler@destroy');
Route::get('edit/{id}', 'HelloControler@edit');
Route::get('create', 'HelloControler@create');

Route::get('/', 'HelloControler@welcome');
// Route::get('welcome', 'HelloControler@welcome');
Route::get('select', 'HelloControler@select');
Route::get('select/get_datatable', 'HelloControler@get_datatable');
Route::get('export', 'HelloControler@export');
Route::resource('user', 'HelloControler');
Route::get('et/{id}', 'HelloControler@et');
Route::post('update2', 'HelloControler@update2');
Route::post('import', 'HelloControler@import');

