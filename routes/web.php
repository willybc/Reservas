<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OptionController;


Route::get('/', [SpaceController::class, 'index'])->name('home');
Route::get('/loadResource/{id}', [SpaceController::class, 'show'])->name('space.show');

require __DIR__.'/auth.php';

Route::get('/dashboard', [HomeController::class, 'indexAdmin'])
    ->middleware(['auth'])
    ->name('admin.dashboard');

Route::get('/spaces', [SpaceController::class, 'indexAdmin'])
    ->middleware(['auth'])
    ->name('admin.spaces');

Route::get('/spaces/create', [SpaceController::class, 'createAdmin'])
    ->middleware(['auth'])
    ->name('admin.spaces.create');

Route::get('/spaces/{id}/edit', [SpaceController::class, 'editAdmin'])
    ->middleware(['auth'])
    ->name('admin.spaces.edit');

Route::put('/spaces/{id}', [SpaceController::class, 'update'])
    ->middleware(['auth'])
    ->name('admin.spaces.update');

Route::delete('/spaces/{id}', [SpaceController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('admin.spaces.destroy');

Route::post('/spaces', [SpaceController::class, 'store'])
    ->middleware(['auth'])
    ->name('spaces.store');

Route::get('/reservations', [ReservationController::class, 'indexAdmin'])
    ->middleware(['auth'])
    ->name('admin.reservations');

Route::get('/users', [UserController::class, 'indexAdmin'])
    ->middleware(['auth'])
    ->name('admin.users');

Route::get('/options', [OptionController::class, 'indexAdmin'])
    ->middleware(['auth'])
    ->name('admin.options');