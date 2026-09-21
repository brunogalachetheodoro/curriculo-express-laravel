<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\UserController;

Route::get('/auth', function () {
    return view('welcome');
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/curriculum-fields', [CurriculumController::class, 'show'])->middleware('auth');
Route::put('/curriculum', [CurriculumController::class, 'update'])->middleware('auth');
Route::put('/curriculum/font-size', [CurriculumController::class, 'updateFontSize'])->middleware('auth');

Route::get('/user/show-language', [UserController::class, 'showLanguage'])->middleware('auth');
Route::put('/user/language', [UserController::class, 'updateLanguage'])->middleware('auth');

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*')->middleware('auth');