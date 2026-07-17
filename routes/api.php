<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\workspaceController;
use App\Http\Controllers\TaskController;


Route::apiResource('users', UserController::class);
Route::apiResource('workspaces', WorkspaceController::class);
Route::post('/workspaces/{workspace}/invite', [WorkspaceController::class, 'invite']);
Route::get('/workspaces/{workspace}/members', [WorkspaceController::class, 'members']);
Route::get('/tasks/{workspace}', [TaskController::class, 'show']);
Route::put('/tasks/{task}', [TaskController::class, 'update']);
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
Route::patch('/tasks/{task}/status', [TaskController::class, 'changeStatus']);