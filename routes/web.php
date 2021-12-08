<?php /** @noinspection PhpUndefinedMethodInspection */

use Illuminate\Support\Facades\Route;

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
Route::view('/teste', 'home')
    ->name('home');

Route::view('home', 'home')
    ->name('home');

Route::view('planosevalores', 'planosvalores')
    ->name('planosvalores');

Route::view('cursos', 'cursos')
    ->name('cursos');

Route::inertia('/', 'Welcome')
    ->name('welcome');

Route::inertia('/planos', 'Planos')
    ->name('planos');

Route::inertia('/cursos', 'Cursos')
    ->name('cursos');

Route::middleware(['auth'])->group(function () {

    Route::inertia('/dashboard', 'Dashboard')
        ->name('dashboard');

    Route::inertia('/race', 'Race')
        ->name('race');

});

require __DIR__.'/auth.php';
