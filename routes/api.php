<?php

use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\CandidatureController;
use Illuminate\Support\Facades\Route;

// Route::apiResource('offers', OfferController::class);
Route::get('/offers', [OfferController::class, 'index']);
Route::post('/offers', [OfferController::class, 'store']);
Route::get('/offers/{offer}', [OfferController::class, 'show']);
Route::put('/offers/{offer}', [OfferController::class, 'update']);
Route::delete('/offers/{offer}', [OfferController::class, 'destroy']);

Route::post('/offers/{offer}/apply', [CandidatureController::class, 'apply']);

Route::get('/offers/{offer}/applications', [CandidatureController::class, 'applications']);
Route::patch('/applications/{application}/accept', [CandidatureController::class, 'accept']);

Route::patch('/applications/{application}/reject', [CandidatureController::class, 'reject']);