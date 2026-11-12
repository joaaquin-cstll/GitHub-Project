<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('about', [MainController::class, 'about'])->name('about');
Route::get('home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('user/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('home.edit');

Auth::routes(['verify' => true]);
