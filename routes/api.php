<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
Route::get('/students/{id}/subjects', [SubjectController::class, 'index']);
Route::post('/students/{id}/subjects', [SubjectController::class, 'store']);
Route::get('/students/{id}/subjects/{subject_id}', [SubjectController::class, 'show']);
Route::patch('/students/{id}/subjects/{subject_id}', [SubjectController::class, 'update']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
