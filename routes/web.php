<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

Route::post('/register',[AuthController::class, 'register']);


