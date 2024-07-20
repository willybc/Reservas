<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaceController;

Route::get('/', [SpaceController::class, 'index'])->name('home');
Route::get('/loadResource/{id}', [SpaceController::class, 'show'])->name('space.show');

require __DIR__.'/auth.php';

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');
