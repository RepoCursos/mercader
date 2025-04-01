<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CsvProductoController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PdfController;

Route::get('/producto', [ProductoController::class, 'index'])->name('producto.index');
Route::get('/producto/create', [ProductoController::class, 'create'])->name('producto.create');
Route::get('/producto/edit/{producto}', [ProductoController::class, 'edit'])->name('producto.edit');
Route::post('/producto/store', [ProductoController::class, 'store'])->name('producto.store');
Route::put('/producto/update/{producto}', [ProductoController::class, 'update'])->name('producto.update');
Route::delete('producto/destroy/{producto}', [ProductoController::class, 'destroy'])->name('producto.destroy');

/** Ruta para descargar pdf.example del curso de GogoDev */
Route::get('/producto/download', [ProductoController::class, 'download'])->name('producto.download');

Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
Route::get('/categoria/edit/{categoria}', [CategoriaController::class, 'edit'])->name('categoria.edit');
Route::post('/categoria/store', [CategoriaController::class, 'store'])->name('categoria.store');
Route::put('/categoria/update/{categoria}', [CategoriaController::class, 'update'])->name('categoria.update');
Route::delete('/categoria/destroy/{categoria}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');

/** estas rutas son para enviar mails desde una interface de la app */
Route::get('/mail', [MailController::class, 'index'])->name('mail.index');
Route::post('/mail/send', [MailController::class, 'send'])->name('mail.send');

/** estas rutas son para enviar mails de forma automatica sin tener interfaces */

/** rutas para exportar e importar archivos csv */
Route::get('/export', [CsvProductoController::class, 'export'])->name('export');
Route::post('/import', [CsvProductoController::class, 'import'])->name('import');

Route::view('/', 'home')->name('home');
