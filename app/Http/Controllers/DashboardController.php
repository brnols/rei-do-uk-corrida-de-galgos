<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Inertia\Inertia;
use App\Models\Pista;
use Inertia\Response;
use App\Services\Corridas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    protected $corridas;

    public function __construct(Corridas $corridas)
    {
        $this->corridas = $corridas;
    }
    
    public function __invoke(string $pista = ''): Response
    {
        $lista_table = ( $pista === '' )? $this->corridas->lista_table() : [$pista];

        $track = Pista::whereIn('tabela', $lista_table)
                ->first();
        
        $pistas_selecionadas = Pista::whereIn('tabela', $lista_table)->get();
        
        $races =  $pistas_selecionadas->map(function ($model, $key) {
            return $this->getRacesfromTrack($model);
        });

        return Inertia::render('Dashboard', [
            'pistas' => Pista::whereIn('tabela', $this->corridas->lista_table())->get(), // Todas as pistas criadas no banco
            'pista'  => $track,
            'races'  => $races // Somente races das pistas selecionadas e criadas no banco
        ]);
    }

    private function getRacesfromTrack(Pista $pista)
    {
        if (!Schema::hasTable($pista->tabela)) return [];

        $races = DB::table($pista->tabela)->get();

        return $races->map(function ($race, $index) use($pista) {

            /* Pega o id da Race */
            preg_match('/^(Race\s)(\d*)(.*)$/', $race->Race_info, $matches);
            $id = (count($matches) > 2 )? $matches[2] : ($index+1);

            return [
                'id'       => $id,
                'hora_uk'  => Carbon::createFromFormat('H:i:s', $race->Horario)->format('H:i'),
                'hora_br'  => Carbon::createFromFormat('H:i:s', $race->Horario)->subHour(3)->format('H:i'),
                'horario'  => $race->Horario,
                'info'     => explode('/', $race->Race_info)[1],
                'liberada' => $id == 1 || Auth::user()->assinante,
                'pista_id' => $pista->id
            ];
        });
    }

}
