<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZapatoController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CarritoController;

Route::get('/', [TiendaController::class, 'index'])->name('tienda.index');



Route::get('/login', [UsuarioController::class, 'login'])->name('formulario.login');

Route::post('/login', [UsuarioController::class, 'authenticate'])->name('formulario.authenticate');

Route::get('/logout', [UsuarioController::class, 'logout'])->name('formulario.logout');


Route::get('/zapatos/create', [ZapatoController::class, 'create']);
Route::resource('zapatos', ZapatoController::class);
Route::get('zapatos/create', [ZapatoController::class, 'create'])->name('zapatos.create');
Route::get('/zapatos', [App\Http\Controllers\ZapatoController::class, 'index'])->name('zapatos.index');
Route::resource('formulario', UsuarioController::class)->parameters([
    'formulario' => 'usuario'
]);
Route::get('formulario', [UsuarioController::class, 'index'])->name('formulario.index');
Route::get('formulario/create',[UsuarioController::class, 'create'])->name('formulario.create');
Route::get('formulario/{usuario}/edit', [UsuarioController::class, 'edit'])->name('formulario.edit');


Route::get('/perfil/compras', [CarritoController::class, 'compras'])->name('perfil.compras');

Route::get('/tienda/{id}/preview', [TiendaController::class, 'preview'])->name('tienda.preview');

Route::post('/carrito/comprar', [CarritoController::class, 'comprarCarrito'])->name('carrito.comprar');

Route::get('/tienda/categorias', [TiendaController::class, 'categorias'])->name('tienda.categorias');

Route::post('/carrito/agregar/{id}', [TiendaController::class, 'agregarAlCarrito'])->name('comprar.zapato');
Route::post('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');
Route::post('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');


Route::get('/tienda/carrito', action: [CarritoController::class, 'mostrar'])->name('tienda.carrito');

Route::get('/tienda/bestsellers', [TiendaController::class, 'masVendidos'])->name('tienda.bestsellers');

Route::get('/buscar/zapatos', [TiendaController::class, 'buscarZapatos']);

