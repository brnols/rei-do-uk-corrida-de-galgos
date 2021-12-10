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

            $races = DB::table($pista)->orderBy('Horario', 'asc')->get();

            $races = $races->map(function ($race) {
                return [
                    'id'      => 0,
                    'hora_uk' => $race->Horario,
                    'hora_br' => Carbon::parse($race->Horario)->subHour(3)->format('H:i'),
                    'info'    => explode('/', $race->Race_info)[1]
                ];
            });

            if ($request->input('race')) {
                $races = $races->filter(function ($race) use ($request) {
                    $input = trim($request->input('race'), " ");
                    $value = trim(strtok($race->Race_info, '/'), " ");
                    return $input === $value;
                });
            }
        }

        return Inertia::render('Dashboard', [
            'pistas' => Pista::all(),
            'races'  => $races
        ]);
    }
}
