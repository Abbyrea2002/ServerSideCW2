<?php
use Illuminate\Auth\middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {  
    Route::apiResource('books', BooksController::class);  
});


Route::post('/login', [AuthController::class, 'login']); 

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

