<?php

namespace App\Http\Controllers;

use App\Models\Pista;

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

        if ($pista && Schema::hasTable($pista)) {
            $races = DB::table($pista)->get();

            if($request->input('race')) {
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
