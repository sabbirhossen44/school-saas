<?php

use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;


Route::controller(TenantController::class)->group(function () {
    Route::get('/tenants', 'index')->name('tenants.index');
    Route::get('/tenants/create', 'create')->name('tenants.create');
    Route::post('/tenants', 'store')->name('tenants.store');
    Route::get('/tenants/{tenant}', 'show')->name('tenants.show');
    Route::get('/tenants/{tenant}/edit', 'edit')->name('tenants.edit');
    Route::put('/tenants/{tenant}', 'update')->name('tenants.update');
    Route::delete('/tenants/{tenant}', 'destroy')->name('tenants.destroy');
});
