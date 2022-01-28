<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Pista;
use App\Services\Corridas;
use Illuminate\Http\Request;
use App\Services\Indicadores;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class RaceController extends Controller
{
    protected $corridas;

    public function __construct(Corridas $corridas)
    {
        $this->corridas = $corridas;
    }

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
            'prox_corridas_pista' => DB::table($pista)->where("Horario", ">", $race)->get()->map(function($model, $key){
                $model->hora_br = Carbon::createFromFormat('H:i:s', $model->Horario)->subHour(3)->format('H:i');
                $model->hora_uk = Carbon::createFromFormat('H:i:s', $model->Horario)->format('H:i');
                return $model; 
            }),
            'prox_corridas'       => $this->proximas_corridas($pista, $race),
            'canil'               => Auth::user()->canils
        ]);
    }

    private function proximas_corridas($pista_atual, $race)
    {
      
        $corridas = collect([]);

        foreach( $this->corridas->lista_table() as $pista)
                $corridas = $corridas->merge( 
                    DB::table($pista)->where("Horario", ">", now()->addHour(3)->format('H:i'))->get()->map(function($model, $key) use($pista){
                        $model->tabela = $pista;
                        $model->pista = Pista::whereTabela($pista)->first()->nome;
                        $model->hora_br = Carbon::createFromFormat('H:i:s', $model->Horario)->subHour(3)->format('H:i');
                        $model->hora_uk = Carbon::createFromFormat('H:i:s', $model->Horario)->format('H:i');
                        return $model; 
                    }) 
                );
        
        return $corridas->sortBy("Horario")->splice(0, 6);
    }
}
