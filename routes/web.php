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

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::middleware('role:Admin')->group(function() {

        /* Spaces */
        Route::get('/dashboard', [HomeController::class, 'indexAdmin'])
            ->name('admin.dashboard');

        Route::get('/spaces', [SpaceController::class, 'index'])
            ->name('admin.spaces');

        Route::get('/spaces/create', [SpaceController::class, 'createAdmin'])
            ->name('admin.spaces.create');

        Route::get('/spaces/{id}/edit', [SpaceController::class, 'editAdmin'])
            ->name('admin.spaces.edit');

        Route::put('/spaces/{id}', [SpaceController::class, 'update'])
            ->name('admin.spaces.update');

        Route::delete('/spaces/{id}', [SpaceController::class, 'destroy'])
            ->name('admin.spaces.destroy');
        
        Route::post('/spaces', [SpaceController::class, 'store'])
            ->name('admin.spaces.store');

        /* Reservations */
        Route::get('/reservations', [ReservationController::class, 'indexAdmin'])
            ->name('admin.reservations');

        /* Users */
        Route::get('/users', [UserController::class, 'indexAdmin'])
            ->name('admin.users');

        Route::get('/users/create', [UserController::class, 'createAdmin'])
            ->name('admin.users.create');

        Route::get('/users/{id}/edit', [UserController::class, 'editAdmin'])
            ->name('admin.users.edit');

        Route::post('/users', [UserController::class, 'store'])
            ->name('admin.users.store');

        Route::put('/users/{id}', [UserController::class, 'update'])
            ->name('admin.users.update');

        Route::delete('/users/{id}', [UserController::class, 'destroy'])
            ->name('admin.users.destroy');

        /* Options Admin */
        Route::get('/options', [OptionController::class, 'indexAdmin'])
            ->name('admin.options');
    });
   

    
        
});