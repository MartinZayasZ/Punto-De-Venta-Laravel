<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Rutas generales
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


//Rutas del controlador de productos
Route::get('/productos', 'ProductController@list')->name('product.list');
Route::get('/agregar-producto', 'ProductController@add')->name('product.add');

Route::post('/producto/guardar', 'ProductController@save')->name('product.save');
Route::get('/productos/eliminar/{id}', 'ProductController@delete')->name('product.delete');
