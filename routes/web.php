<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'index']);

Route::get('/admin/create', [BlogController::class, 'create']);

Route::post('/admin/store', [BlogController::class, 'store']);

Route::get('/admin/edit/{id}', [BlogController::class, 'edit']);

Route::post('/admin/update/{id}', [BlogController::class, 'update']);

Route::get('/admin/delete/{id}', [BlogController::class, 'delete']);

Route::get('/filter', [BlogController::class, 'filter']);

Route::get('/login', [BlogController::class, 'login']);

Route::post('/login-user', [BlogController::class, 'loginUser']);

Route::get('/logout', [BlogController::class, 'logout']);