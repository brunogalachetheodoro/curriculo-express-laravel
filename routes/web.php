<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CurriculumController;

Route::get('/auth', function () {
    return view('welcome');
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/curriculum-fields', [CurriculumController::class, 'show'])->middleware('auth');
Route::put('/curriculum', [CurriculumController::class, 'update'])->middleware('auth');
Route::put('/curriculum/font-size', [CurriculumController::class, 'updateFontSize'])->middleware('auth');

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*')->middleware('auth');