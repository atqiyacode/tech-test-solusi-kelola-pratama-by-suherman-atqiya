<?php

use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ServiceDetailController;
use App\Http\Controllers\API\ServiceHeaderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// register new user
Route::post('register', [AuthenticationController::class, 'register']);
// login user
Route::post('login', [AuthenticationController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    // session user profile
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    // order resources
    Route::apiResource('order', OrderController::class)->only(['index', 'show']);
    // service header
    Route::apiResource('serviceHeader', ServiceHeaderController::class)->only(['index', 'show']);
    // service detail
    Route::apiResource('serviceDetail', ServiceDetailController::class)->only(['index', 'show']);

    // logout
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});
