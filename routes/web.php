<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/produtos', [ProductController::class, 'index'])->name('products.index');

Route::prefix('carrinho')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::get('/adicionar/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/remover/{index}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/finalizar', [CartController::class, 'checkout'])->name('cart.checkout');
});

Route::prefix('contato')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/enviar', [ContactController::class, 'send'])->name('contact.send');
});

Route::prefix('compras')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/{order}', [OrderController::class, 'show'])->name('orders.show');
});

Route::prefix('compras')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/{order}', [OrderController::class, 'show'])->name('orders.show');
});