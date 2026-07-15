<?php

use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkShopeController;


Route::apiResource('users', UserController::class);
Route::apiResource('workspaces', WorkShopeController::class);
Route::apiResource('message', TestController::class);