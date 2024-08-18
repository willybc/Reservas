<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OptionController;


Route::get('/', [SpaceController::class, 'index'])->name('home');
Route::get('/loadResource/{id}', [SpaceController::class, 'show'])->name('space.show');

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', [HomeController::class, 'indexAdmin'])
        ->name('admin.dashboard');

    /* Spaces Admin */
    Route::get('/admin/spaces', [SpaceController::class, 'index'])
        ->name('admin.spaces');

    Route::get('/admin/spaces/create', [SpaceController::class, 'createAdmin'])
        ->name('admin.spaces.create');

    Route::get('/admin/spaces/{id}/edit', [SpaceController::class, 'editAdmin'])
        ->name('admin.spaces.edit');

    Route::put('/admin/spaces/{id}', [SpaceController::class, 'update'])
        ->name('admin.spaces.update');

    Route::delete('/admin/spaces/{id}', [SpaceController::class, 'destroy'])
        ->name('admin.spaces.destroy');

    Route::post('/admin/spaces', [SpaceController::class, 'store'])
        ->name('admin.spaces.store');

    /* Reservations Admin */
    Route::get('/admin/reservations', [ReservationController::class, 'indexAdmin'])
        ->name('admin.reservations');

    /* Users Admin */
    Route::get('/admin/users', [UserController::class, 'indexAdmin'])
        ->name('admin.users');

    Route::get('/admin/users/create', [UserController::class, 'createAdmin'])
        ->name('admin.users.create');

    Route::get('/admin/users/{id}/edit', [UserController::class, 'editAdmin'])
        ->name('admin.users.edit');

    Route::post('/admin/users', [UserController::class, 'store'])
        ->name('admin.users.store');

    Route::put('/admin/users/{id}', [UserController::class, 'update'])
        ->name('admin.users.update');

    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])
        ->name('admin.users.destroy');

    /* Options Admin */
    Route::get('/admin/options', [OptionController::class, 'indexAdmin'])
        ->name('admin.options');
        
});