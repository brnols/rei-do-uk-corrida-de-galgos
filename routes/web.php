<?php /** @noinspection PhpUndefinedMethodInspection */

use App\Http\Controllers\DashboardController;
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

Route::view('old', 'home')
    ->name('home');

Route::view('old-planos', 'planosvalores')
    ->name('planosvalores');

Route::view('old-cursos', 'cursos')
    ->name('cursos');

Route::inertia('/', 'Welcome')
    ->name('welcome');

Route::inertia('/planos', 'Planos')
    ->name('planos');

Route::inertia('/cursos', 'Cursos')
    ->name('cursos');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard/{pista?}', DashboardController::class)
        ->name('dashboard');

    Route::get('/dashboard/{pista?}/{race}', DashboardController::class)
        ->name('race');

});

require __DIR__.'/auth.php';
