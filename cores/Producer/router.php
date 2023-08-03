<?php

use Illuminate\Support\Facades\Route;
use Producer\Http\Controllers\ProducerController;

// prefix: producers

Route::get('/', [ProducerController::class, 'index'])->name('producers.index');
Route::get('{producer}/edit', [ProducerController::class, 'edit']);
Route::put('{producer}', [ProducerController::class, 'update']);
