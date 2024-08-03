<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Checklogin;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

Route::get('/', function () {
    Mail::to("chienpv12@fpt.edu.vn")->send(new OrderShipped("Pham Van Chien"));
    return view('welcome');
});

Route::get('/about',[AboutController::class, "index"]);
Route::get('/new/about',[AboutController::class, "new"]);
Route::post('/new/about',[AboutController::class, "create"]);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
