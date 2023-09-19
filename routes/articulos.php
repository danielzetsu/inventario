<?php

Route::get('/', 'Articulos\ArticulosController@index')->name('index_articulos');
Route::get('create', 'Articulos\ArticulosController@create');
Route::get('edit', 'Articulos\ArticulosController@edit');
Route::post('store', 'Articulos\ArticulosController@store');
Route::get('update', 'Articulos\ArticulosController@update'); 