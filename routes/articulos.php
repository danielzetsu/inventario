<?php
 
Route::get('/', 'Articulos\ArticulosController@index')->name('articulos.index');
Route::get('/create', 'Articulos\ArticulosController@create')->name('articulos.create');
Route::post('/store', 'Articulos\ArticulosController@store');
Route::get('/edit/{id}', 'Articulos\ArticulosController@edit')->name('articulos.edit');
Route::post('/update/{id}', 'Articulos\ArticulosController@update');
Route::delete('/destroy/{id}', 'Articulos\ArticulosController@destroy');
