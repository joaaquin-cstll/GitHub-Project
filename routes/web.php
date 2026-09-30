<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;


Route::get('/', [MainController::class, 'index']);

Route::get('about', [MainController::class, 'about']);

Route::get('aboutMetodo', [MainController::class, 'aboutMetodo'])->name('aboutMetodo');

Route::get('aboutNombre', [MainController::class, 'aboutNombre'])->name('aboutNombre');

Route::get('aboutRuta', [MainController::class, 'aboutRuta'])->name('aboutRuta');