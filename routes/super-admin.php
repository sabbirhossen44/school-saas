<?php

use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;


Route::controller(TenantController::class)->group(function () {
    Route::get('/tenants', 'index')->name('tenants.index');
    Route::get('/tenant/create', 'create')->name('tenant.create');
    Route::post('/tenant', 'store')->name('tenant.store');
    Route::get('/tenant/{tenant}', 'show')->name('tenants.show');
    Route::get('/tenant/{tenant}/edit', 'edit')->name('tenant.edit');
    Route::put('/tenant/{tenant}', 'update')->name('tenant.update');
    Route::delete('/tenant/{tenant}', 'destroy')->name('tenants.destroy');
});
