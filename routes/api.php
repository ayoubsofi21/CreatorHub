<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RealisationController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\CommentController;

Route::get('/test', function () {
    return response()->json([
        'message' => 'CreatorHub API Working'
    ]);
});

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {


    Route::get('/profile', [AuthController::class, 'profile']);


    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('/realisations', RealisationController::class);
});


