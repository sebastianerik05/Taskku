<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TugasController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [TugasController::class, 'index'])
    ->name('dashboard');

Route::get('/kalender', [TugasController::class, 'kalender'])
    ->name('kalender');


Route::get('/statistik', [TugasController::class, 'statistik'])
    ->name('statistik');


Route::resource('tugas', TugasController::class)
    ->parameters(['tugas' => 'tugas']);
