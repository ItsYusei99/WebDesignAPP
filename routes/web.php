<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Order;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::post('/rastreo', function (Request $request) {
    $request->validate([
        'customer_number' => 'required',
        'invoice_number' => 'required'
    ]);

    $order = Order::with('client')
        ->whereHas('client', function($query) use ($request) {
            $query->where('customer_number', $request->customer_number);
        })
        ->where('invoice_number', $request->invoice_number)
        ->first();

    if (!$order) {
        return back()->with('error', 'No se encontró ningún pedido con esos datos. Verifica tu número de cliente y factura.');
    }

    return view('welcome', compact('order'));
})->name('rastreo.search');



Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);

    Route::resource('clients', ClientController::class);

    Route::resource('products', ProductController::class);

    Route::get('/orders/archived', [OrderController::class, 'archived'])->name('orders.archived');
    Route::post('/orders/{id}/restore', [OrderController::class, 'restore'])->name('orders.restore');
    
    Route::post('/orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    
    Route::resource('orders', OrderController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';