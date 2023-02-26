<?php

use App\Http\Controllers\Api\AuthController;


Route::middleware(['auth.api'])->group(function () {


//Does not require to be logeed in
Route::post('/login', [AuthController::class, 'login']);
//needs user to be logged in
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh-token', [AuthController::class, 'refreshToken']);
});

});
