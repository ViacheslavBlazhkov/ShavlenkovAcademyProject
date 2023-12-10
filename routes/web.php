<?php

use App\Http\Controllers\AppleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FibonacciController;
use App\Http\Controllers\NestingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', static function () {
    return view('welcome');
});

// Homework #2
Route::get('/user/{last_name}/{first_name}', UserController::class);
Route::get('/api/nesting/{i}', NestingController::class);
Route::get('/api/fibonacci/{index}', FibonacciController::class);
Route::get('/api/apples/{pattern}/{index}', AppleController::class)->where('pattern', '[rgy]*');
Route::get('/auth/{login}/{password}', AuthController::class)->middleware('check_password');