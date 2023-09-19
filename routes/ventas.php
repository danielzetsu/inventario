<?php
Route::get('/', 'Ventas\VentasController@index')->name('index_ventas');
Route::get('create', 'Ventas\VentasController@create');
Route::get('edit', 'Ventas\VentasController@edit');
Route::post('/', 'Ventas\VentasController@store');
Route::get('update', 'Ventas\VentasController@update');