<?php

use App\Http\Controllers\ProductosController;
use App\Http\Controllers\VentasController;
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
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/productos', [ProductosController::class, 'index'])->name('productos');
Route::post('/productos/guardar', [ProductosController::class, 'store'])->name('productos_guardar');
Route::get('/productos/editar/{id}', [ProductosController::class, 'show'])->name('productos_editar');
Route::get('/productos/eliminar/{id}', [ProductosController::class, 'delete'])->name('productos_eliminar');

Route::get('/ventas', [VentasController::class, 'index'])->name('ventas');
Route::post('/ventas/guardar', [VentasController::class, 'store'])->name('ventas_guardar');
