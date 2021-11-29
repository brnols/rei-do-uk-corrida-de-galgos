<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('/', 'home')
    ->name('home');

Route::view('home', 'home')
    ->name('home');

Route::view('planosevalores', 'planosvalores')
    ->name('planosvalores');

    Route::view('cursos', 'cursos')
    ->name('cursos');

require __DIR__.'/app.php';

require __DIR__.'/auth.php';
