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
Route::get('/producto/{id}', 'ProductController@edit')->name('product.edit');

Route::post('/producto/guardar', 'ProductController@save')->name('product.save');
Route::post('/producto/actualizar', 'ProductController@update')->name('product.update');
Route::get('/productos/eliminar/{id}', 'ProductController@delete')->name('product.delete');


//Rutas del controlador de ventas
Route::get('/ventas', 'SaleController@list')->name('sale.list');
Route::get('/venta/{id}', 'SaleController@edit')->name('sale.edit');
Route::post('/venta/{id}', 'SaleController@update')->name('sale.update');
