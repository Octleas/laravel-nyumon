<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/diary', [\App\Http\Controllers\ApiDiaryController::class, 'index'])->name('api.diary.index');