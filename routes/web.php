<?php /** @noinspection PhpUndefinedMethodInspection */

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FiltroController;
use App\Http\Controllers\RaceController;
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

Route::webhooks('hotmart-events');

Route::inertia('/', 'Welcome')
    ->name('welcome');

Route::inertia('/cursos', 'Cursos')
    ->name('cursos');

Route::inertia('/canil', 'Canil')
    ->name('canil');

Route::middleware(['auth'])->group(function () {

    Route::get('/corridas/{pista?}', DashboardController::class)
        ->name('dashboard');

    Route::get('/corridas/{pista?}/{race}', RaceController::class)
        ->name('race');

    Route::inertia('/planos', 'Planos')
        ->name('planos');

    Route::resource('/filtros', FiltroController::class)
        ->only(['index', 'store']);

});

require __DIR__ . '/auth.php';
