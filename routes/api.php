<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/students/{id}/subjects', [StudentController::class, 'index1']);
Route::post('/students/{id}/subjects', [StudentController::class, 'store1']);
Route::get('/students/{id}/subjects/{subject_id}', [StudentController::class, 'show1']);
Route::patch('/students/{id}/subjects/{subject_id}', [StudentController::class, 'update1']);

use App\Http\Controllers\SubjectController;

Route::get('/students/{id}/subjects', [SubjectController::class, 'index2']);
Route::post('/students/{id}/subjects', [SubjectController::class, 'store2']);
Route::get('/students/{id}/subjects/{subject_id}', [SubjectController::class, 'show2']);
Route::patch('/students/{id}/subjects/{subject_id}', [SubjectController::class, 'update2']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
