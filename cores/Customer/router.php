<?php

use Customer\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

// prefix: customers

Route::get('create', [CustomerController::class, 'create']);
Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
Route::post('/', [CustomerController::class, 'store']);
Route::delete('{customer}', [CustomerController::class, 'destroy']);
Route::get('{customer}/edit', [CustomerController::class, 'edit']);
Route::put('{customer}', [CustomerController::class, 'update']);
Route::get('{customer}/show', [CustomerController::class, 'show']);
