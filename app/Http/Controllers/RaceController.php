<?php

namespace App\Http\Controllers;

use App\Models\Pista;
use App\Services\Indicadores;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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
        /* Pista existe */
        $pistaAtual = Pista::where('tabela', $pista)->firstOrFail();

        /* Tabela existe */
        if (Schema::hasTable($pista) === false) {
            abort(404);
        }

        /* Corrida existe */
        $raceExists = DB::table($pista)->where('Horario', $race)->exists();

        if (!$raceExists) {
            abort(404);
        }

        $service     = new Indicadores($pista, $race);
        $indicadores = $service->all();

        return Inertia::render('Race', [
            'pista'               => $pistaAtual,
            'indicadores'         => $indicadores,
            'prox_corridas_pista' => DB::table($pista)->where("Horario", ">", $race)->get(),
            'canil'               => Auth::user()->canils
        ]);
    }
}
