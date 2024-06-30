<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::patch('/students/{id}', [StudentController::class, 'update']);
Route::get('/students/{id}', [StudentController::class, 'show']);
Route::get('/students', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'store']);



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
