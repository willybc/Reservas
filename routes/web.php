<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaceController;

Route::get('/', [SpaceController::class, 'index'])->name('welcome');
Route::get('/loadResource/{id}', [SpaceController::class, 'show'])->name('space.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
