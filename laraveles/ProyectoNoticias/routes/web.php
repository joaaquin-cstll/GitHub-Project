<?php

use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ComentarioController;
use Illuminate\Support\Facades\Route;

// Redirigir la raíz al listado de noticias
Route::get('/', [NoticiaController::class, 'index']);

// Rutas de tipo Resource para las Noticias (index, create, store, show, edit, update, destroy)
Route::resource('noticias', NoticiaController::class);

// Rutas para Comentarios asociados a una noticia
Route::post('noticias/{noticia}/comentarios', [ComentarioController::class, 'store'])
    ->name('comentarios.store');

Route::put('comentarios/{comentario}', [ComentarioController::class, 'update'])
    ->name('comentarios.update');

Route::delete('comentarios/{comentario}', [ComentarioController::class, 'destroy'])
    ->name('comentarios.destroy');
