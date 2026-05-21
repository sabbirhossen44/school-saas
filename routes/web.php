<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

// Route::middleware('tenant')->group(function () {

//     Route::get('/', function () {
//         return 'Tenant Working';
//     });

// });



include __DIR__.'/super-admin.php';
include __DIR__.'/admin.php';
include __DIR__.'/teacher.php';
include __DIR__.'/student.php';
