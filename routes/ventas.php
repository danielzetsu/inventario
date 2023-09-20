<?php

Route::get('/', 'Ventas\VentasController@index')->name('ventas.index');
Route::get('/create', 'Ventas\VentasController@create')->name('ventas.create');
Route::post('/store', 'Ventas\VentasController@store');
Route::post('/change/{id}', 'Ventas\VentasController@change');
Route::get('/edit/{id}', 'Ventas\VentasController@edit')->name('ventas.edit');
Route::post('/update/{id}', 'Ventas\VentasController@update');
Route::delete('/destroy/{id}', 'Ventas\VentasController@destroy');
