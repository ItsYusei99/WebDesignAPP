<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. RUTA PÚBLICA: Buscador de facturas para clientes
Route::get('/', [OrderController::class, 'publicSearch'])->name('home');

// 2. RUTAS PROTEGIDAS: Requieren que el usuario esté logueado
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard principal
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Gestión de Usuarios (CRUD completo)
    Route::resource('users', UserController::class);

    // Gestión de Órdenes (CRUD completo)
    Route::resource('orders', OrderController::class);

    // Ruta específica para actualizar estatus y subir fotografía de evidencia
    Route::post('/orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

    // Rutas para el manejo de órdenes archivadas (Borrado Lógico)
    Route::get('/archived-orders', [OrderController::class, 'archived'])->name('orders.archived');
    Route::post('/orders/{id}/restore', [OrderController::class, 'restore'])->name('orders.restore');

    // Rutas de Perfil (Generadas por Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de autenticación (Login, Registro, etc. generadas por Breeze)
require __DIR__.'/auth.php';