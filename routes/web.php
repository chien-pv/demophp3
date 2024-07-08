<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [AboutController::class, "index"]);

// Route::get('/about/new', [AboutController::class, "new"]);

Route::get('/about/{id}', [AboutController::class, "show"]);

Route::post('/about', [AboutController::class, "create"]);

// Route::get('/about/{id}/edit', [AboutController::class, "edit"]);

// Route::put('/about/{id}/update', [AboutController::class, "update"]);

// Route::delete('/about/{id}', [AboutController::class, "delete"]);
// Route::patch('/about', [AboutController::class, "index"]);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
