<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandsController;
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
//Inicio
Route::get('/', [ProductsController::class, 'productosIndex' ])->name('products.productosIndex'); 

//Ruta Inicio/Home
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');

//Metodos principales de los controladores
Route::resource('/categories', CategoriesController::class);
Route::resource('/user', UserController::class);
Route::resource('/brands', BrandsController::class);
Route::resource('/productosCategorie', ProductsController::class);


//Filtro precio
Route::get('/precio', [ProductsController::class, 'filtroPrecio' ])->name('products.filtroPrecio');

//Ruta para vista de singleProduct
Route::get('/singleProduct', [ProductsController::class, 'singleProduct' ])->name('products.singleProduct');

//Ruta para vista de pantallaCompra
Route::get('/cart', [ProductsController::class, 'pantallaCompra' ])->name('products.pantallaCompra');

//Ruta para comprobar user para Login
Route::post('/comprobar', [UserController::class, 'comprobar' ])->name('account.comprobar');
//Ruta para LogOut
Route::get('/logout', [UserController::class, 'logout'])->name('account.logout');

//-----------------------Ruta administracion productos
Route::resource('/adminProducts', ProductsController::class)->middleware('admin');
Route::resource('/adminBrands', BrandsController::class)->middleware('admin');
