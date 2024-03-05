<?php

use App\Http\Controllers\AlatController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("/login", [AuthController::class, 'login']);
Route::get("/logout", [AuthController::class, 'logout']);



Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/alat', [AlatController::class, 'index']);
    Route::get('/alat/{id}', [AlatController::class, 'show']);
    Route::patch('/alat/{id}', [AlatController::class, 'update']);
    Route::post('/alat', [AlatController::class, 'create']);
    Route::delete('/alat/{id}', [AlatController::class, 'delete']);
});
