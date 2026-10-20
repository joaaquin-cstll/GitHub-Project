<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrimerasRutasController;
use App\Http\Controllers\SegundasRutasController;

Route::get('/', [PrimerasRutasController::class, 'index']);
Route::get('mensaje', [PrimerasRutasController::class, 'primerMensaje']);
Route::get('segunda/enlaces', [SegundasRutasController::class, 'enlaces']);

//ruta tercera/destino en el controller TercerasRutasController a un método de ese controller
Route::get('tercera/destino', [App\Http\Controllers\TercerasRutasController::class, 'notFound']);

//ejemplo de lo que no hay que hecer
//Route::get('/', function() {
    //return view('welcome');

//ejemplo definicion
//Route::get('ruta', [NombreDelControlador::class, 'método']);