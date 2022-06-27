<?php

use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// register new user
Route::post('register', [AuthenticationController::class, 'register']);
// login user
Route::post('login', [AuthenticationController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    // order resources
    Route::apiResource('order', OrderController::class)->only(['index', 'show']);

    // logout
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});
