<?php

use Illuminate\Support\Facades\Route;

Route::prefix('app')->middleware(['auth'])->group(function () {

    Route::inertia('/', 'Dashboard');

    Route::inertia('/dashboard', 'Dashboard')
        ->name('dashboard');

    Route::inertia('/race', 'Race')
        ->name('race');
});
