<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\RealisationController;
use App\Http\Controllers\RealisationSearchController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkspaceController;
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

// Workspace & task routes
Route::apiResource('users', UserController::class);
Route::apiResource('workspaces', WorkspaceController::class);
Route::post('/workspaces/{workspace}/invite', [WorkspaceController::class, 'invite']);
Route::get('/workspaces/{workspace}/members', [WorkspaceController::class, 'members']);
Route::patch('/tasks/{task}/status', [TaskController::class, 'changeStatus']);
Route::apiResource('tasks', TaskController::class);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/realisations', RealisationController::class);
});
