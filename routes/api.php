<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json("Back-end Challenge 2023 🏅 - Space Flight News");
});

Route::prefix('articles')->group(function () {
    Route::get('/', [ArticlesController::class, 'list']);
    Route::get('/{id}', [ArticlesController::class, 'getById']);
    Route::post('/', [ArticlesController::class, 'create']);
    Route::put('/{id}', [ArticlesController::class, 'update']);
    Route::delete('/{id}', [ArticlesController::class, 'destroy']);
});
