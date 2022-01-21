<?php

namespace App\Http\Controllers;

use App\Models\Pista;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(string $pista = ''): Response
    {
        $lista_table = ( $pista === '' )? $this->lista_table() : [$pista];

        $track = Pista::whereIn('tabela', $lista_table)
                ->first();
        
        $pistas_selecionadas = Pista::whereIn('tabela', $lista_table)->get();
        
        $races =  $pistas_selecionadas->map(function ($model, $key) {
            return $this->getRacesfromTrack($model);
        });

        return Inertia::render('Dashboard', [
            'pistas' => Pista::whereIn('tabela', $this->lista_table())->get(), // Todas as pistas criadas no banco
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

    /**
     * @return [ 'tabela_name', 'tabela_name', 'tabela_name']
     */
    public function lista_table()
    {
        return Pista::all()
                    ->reject(function($pista){ 
                        return !$this->table_exist($pista->tabela); 
                    })
                    ->map(function ($model, $key) {
                        return $model->tabela;
                    });
    }

    public function table_exist($table)
    {
        return Schema::hasTable($table)
            && Schema::hasTable("{$table}_tabela");
    }
}
