<?php

use App\Http\Controllers\API\AuthenticationController;
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

    // logout
    Route::post('/logout', [AuthController::class, 'logout']);
});
