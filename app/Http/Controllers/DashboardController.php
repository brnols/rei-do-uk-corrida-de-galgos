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
    public function __invoke(string $pista = 'centralpark'): Response
    {
        $track = Pista::query()
            ->where('tabela', $pista)
            ->firstOrFail();

        return Inertia::render('Dashboard', [
            'pistas' => Pista::all(),
            'pista'  => $track,
            'races'  => $this->getRacesfromTrack($pista)
        ]);
    }

    private function getRacesfromTrack($pista)
    {
        if (!Schema::hasTable($pista)) return [];

        $races = DB::table($pista)->get();

        return $races->map(function ($race, $index) {
            /* Verifica se a hora é P.M ou A.M para conversão*/
            $hora     = (int) strtok($race->Horario, ':');
            $meridiam = $hora < 6 || $hora == 12 ? 'PM' : 'AM';
            $hora     = "$race->Horario $meridiam";

            /* Pega o id da Race */
            preg_match('/^(Race\s)(\d*)(.*)$/', $race->Race_info, $matches);
            $id = (count($matches) > 2 )? $matches[2] : ($index+1);

            return [
                'id'       => $id,
                'hora_uk'  => Carbon::createFromFormat('g:i A', $hora)->format('H:i'),
                'hora_br'  => Carbon::createFromFormat('g:i A', $hora)->subHour(3)->format('H:i'),
                'horario'  => $race->Horario,
                'info'     => explode('/', $race->Race_info)[1],
                'liberada' => $id == 1 || Auth::user()->assinante,
            ];
        });
    }
}
