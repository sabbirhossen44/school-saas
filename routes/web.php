<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

// Route::middleware('tenant')->group(function () {

//     Route::get('/', function () {
//         return 'Tenant Working';
//     });

// });
