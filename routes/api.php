<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterApiController;


Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});

Route::get('/users', [RegisterApiController::class, 'index']);
Route::get('/branch', [RegisterApiController::class, 'branch']);
