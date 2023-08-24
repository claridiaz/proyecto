<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\UsuarioController;


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

Route::get('/', function () {
    return view('welcome');
});

// RUTAS DE LIBRO
Route::get('/libros',[LibroController::class, 'index'])->name('libros.index'); //Muestra los datos de los libros
Route::get('libros/crear',[LibroController::class, 'create'])->name('libros.crear'); //Muestra el formulario
Route::post('libros/crear',[LibroController::class, 'store'])->name('libros.store'); //Envia y Agrega el formulario
Route::get('libros/{id}/editar',[LibroController::class, 'edit'])->whereNumber('id')->name('libros.editar'); //Muestra el formulario
Route::put('libros/{id}/editar',[LibroController::class, 'update'])->whereNumber('id')->name('libros.update'); //Edita el formulario
Route::delete('libros/{id}/borrar',[LibroController::class, 'destroy'])->whereNumber('id')->name('libros.borrar'); //Eliminar registro
Route::get('libros/buscar', [LibroController::class, 'buscar'])->name('libros.buscar');
Route::get('/libros/{id}',[LibroController::class, 'show'])->whereNumber('id')->name('libros.show');

// RUTAS DE PRESTAMO
Route::get('/prestamos',[PrestamoController::class, 'index'])->name('prestamos.index');
Route::get('prestamos/crear',[PrestamoController::class, 'create'])->name('prestamos.crear');
Route::post('prestamos/crear',[PrestamoController::class, 'store'])->name('prestamos.store');
Route::get('prestamos/{id}/editar',[PrestamoController::class, 'edit'])->whereNumber('id')->name('prestamos.editar');
Route::put('prestamos/{id}/editar',[PrestamoController::class, 'update'])->whereNumber('id')->name('prestamos.update');
Route::delete('prestamos/{id}/borrar',[PrestamoController::class, 'destroy'])->whereNumber('id')->name('prestamos.borrar');
Route::get('prestamos/buscar', [PrestamoController::class, 'buscar'])->name('prestamos.buscar');
Route::get('/prestamos/{id}',[PrestamoController::class, 'show'])->whereNumber('id')->name('prestamos.show');


Route::get('/usuarios',[UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('usuarios/crear',[UsuarioController::class, 'create'])->name('usuarios.crear');
Route::post('usuarios/crear',[UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('usuarios/{id}/editar',[UsuarioController::class, 'edit'])->whereNumber('id')->name('usuarios.editar');
Route::put('usuarios/{id}/editar',[UsuarioController::class, 'update'])->whereNumber('id')->name('usuarios.update');
Route::delete('usuarios/{id}/borrar',[UsuarioController::class, 'destroy'])->whereNumber('id')->name('usuarios.borrar');
Route::get('usuarios/buscar', [UsuarioController::class, 'buscar'])->name('usuarios.buscar');
Route::get('/usuarios/{id}',[UsuarioController::class, 'show'])->whereNumber('id')->name('usuarios.show');
