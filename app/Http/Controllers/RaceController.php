<?php

namespace App\Http\Controllers;

use App\Models\Pista;
use App\Services\Indicadores;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class RaceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  string  $pista
     * @param  string  $race
     * @return \Inertia\Response
     */
    public function __invoke(string $pista, string $race): \Inertia\Response
    {
        /* Tabela e corrida existem? */
        if (!Schema::hasTable($pista) && !DB::table($pista)->where('Horario', $race)->exists()) {
            abort(404);
        }

        $pistaAtual = Pista::query()
            ->where('tabela', $pista)
            ->firstOrFail();

        $service     = new Indicadores($pista, $race);
        $indicadores = $service->all();

        $canil = Auth::user()
            ->canils()
            ->where('pista', $pista)
            ->get();

        return Inertia::render('Race', [
            'pista'       => $pistaAtual,
            'indicadores' => $indicadores,
            'canil'       => $canil,
        ]);
    }
}
