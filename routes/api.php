<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/posts', [PostController::class, 'index'])->middleware('auth:sanctum');
Route::get('/posts/{id}', [PostController::class, 'show'])->middleware('auth:sanctum');
Route::get('user/{user_id}/posts', [PostController::class, 'showPostByUser'])->middleware('auth:sanctum');
Route::post('/posts', [PostController::class, 'create'])->middleware('auth:sanctum');
Route::put('/posts/{id}', [PostController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/posts/{id}', [PostController::class, 'delete'])->middleware('auth:sanctum');

//API route để đăng ký
Route::post('/register', [AuthController::class, 'register']);
//API route để đăng nhập
Route::post('/login', [AuthController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) { 
        return auth()->user();
    });
    // API route thoát
    Route::post('/logout', [AuthController::class, 'logout']);
});
