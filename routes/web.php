<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    //return view('welcome');
    //return view('login.login');
    return view('home.index');

});


Route::prefix('ventas')->group(function () {
    require __DIR__ . '/ventas.php';
});

Route::prefix('articulos')->group(function () {
    require __DIR__ . '/articulos.php';
});

