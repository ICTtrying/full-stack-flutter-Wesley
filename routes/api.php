<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Api\TransactionController;
 
 
Route::apiResource('categories', CategoryController::class);
Route::apiResource('transactions', TransactionController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
