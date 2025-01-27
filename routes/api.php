<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [UsersController::class, 'store']);
Route::post('/admin/login', [AdminController::class, 'login']);

