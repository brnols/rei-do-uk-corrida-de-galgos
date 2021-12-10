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
    public function __invoke(Request $request, string $pista = 'centralpark'): Response
    {
        $races      = [];
        $pistaAtual = Pista::firstWhere('tabela', $pista);

        if(!$pistaAtual) {
            abort(404);
        }

        return Inertia::render('Dashboard', [
            'pistas' => Pista::all(),
            'pista'  => $pistaAtual,
            'races'  => $this->getData($pista, $request->input('race'))
        ]);
    }

    private function getData($pista, $filteredRace = null)
    {
        $races = [];

        if (!Schema::hasTable($pista))
        {
            return $races;
        }

        $races = DB::table($pista)->get();

        $races = $races->map(function ($race) {
            /* Verifica se a hora é P.M ou A.M para conversão*/
            $hora          = (int) strtok($race->Horario, ':');
            $meridiam      = $hora < 9 || $hora == 12 ? 'PM' : 'AM';
            $race->Horario = "$race->Horario $meridiam";

            /* Pega o id da Race */
            preg_match('/^(Race\s)(\d*)(.*)$/', $race->Race_info, $matches);
            $id = $matches[2];

            return [
                'id'       => $id,
                'hora_uk'  => Carbon::createFromFormat('g:i A', $race->Horario)->format('H:i'),
                'hora_br'  => Carbon::createFromFormat('g:i A', $race->Horario)->subHour(3)->format('H:i'),
                'info'     => explode('/', $race->Race_info)[1],
                'liberada' => $id == 1 || Auth::user()->assinante,
            ];
        });

        if ($filteredRace) {
            $races = $races->filter(function ($race) use ($filteredRace) {
                preg_match('/^(Race\s)(\d*)(.*)$/', $filteredRace, $matches);
                return $matches[2] === $race['id'];
            });
        }

        return $races;
    }
}
