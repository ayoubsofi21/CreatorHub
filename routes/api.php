<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\RealisationController;
use App\Http\Controllers\RealisationSearchController;
use App\Http\Controllers\SaveController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response()->json([
        'message' => 'CreatorHub API Working',
    ]);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/realisations/search', [RealisationSearchController::class, 'search']);
Route::post('/realisations/{id}/like', [LikeController::class, 'toggleLike']);
Route::post('/realisations/{id}/save', [SaveController::class, 'toggleSave']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/realisations', RealisationController::class);
});
