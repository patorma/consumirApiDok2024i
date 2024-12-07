<?php

use App\Http\Controllers\NasaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::get('nasa/intrumentos',[NasaController::class,'getIntruments']);
Route::get('nasa/activityIDs',[NasaController::class,'getActivityId']);
Route::get('nasa/instrument-porcentaje', [NasaController::class, 'getInstrumentoPorcentaje']);
