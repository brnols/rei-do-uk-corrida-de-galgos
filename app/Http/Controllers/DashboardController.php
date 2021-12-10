<?php

namespace App\Http\Controllers;

use App\Models\Pista;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  string|null  $pista
     * @return Response
     */
    public function __invoke(Request $request, string $pista = 'centralpark'): Response
    {
        $races = [];

        if (Schema::hasTable($pista)) {

            $races = DB::table($pista)->get();

            $races = $races->map(function ($race) {
                /* Verifica se a hora é P.M ou A.M par conversão*/
                $meridiam = strtok($race->Horario, ':') < 10 ? 'PM' : 'AM';
                $race->Horario = "$race->Horario $meridiam";
                /* Pega o id da Race */
                preg_match('/^(Race\s)(\d*)(.*)$/', $race->Race_info, $matches);

                return [
                    'id'        => $matches[2],
                    'hora_uk'   => Carbon::createFromFormat('g:i A', $race->Horario)->format('H:i'),
                    'hora_br'   => Carbon::createFromFormat('g:i A', $race->Horario)->subHour(3)->format('H:i'),
                    'info'      => explode('/', $race->Race_info)[1],
                    'assinante' => true,
                ];
            });

            if ($request->input('race')) {
                $races = $races->filter(function ($race) use ($request) {
                    preg_match('/^(Race\s)(\d*)(.*)$/', $request->input('race'), $matches);
                    return $matches[2] === $race['id'];
                });
            }
        }

        return Inertia::render('Dashboard', [
            'pistas' => Pista::all(),
            'races'  => $races
        ]);
    }
}
