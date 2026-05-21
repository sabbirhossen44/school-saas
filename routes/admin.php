<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])
        ->name('admin.login');

    Route::post('/login', [AuthController::class, 'authenticate'])
        ->name('admin.login.submit');
});
