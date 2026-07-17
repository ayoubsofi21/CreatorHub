<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\RealisationSearchController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/realisations/{id}/like', [LikeController::class, 'toggleLike']);
Route::post('/realisations/{id}/save', [SaveController::class, 'toggleSave']);


Route::get('/realisations/search', [RealisationSearchController::class, 'search']);


