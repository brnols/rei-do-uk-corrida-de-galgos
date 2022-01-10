<?php

namespace App\Http\Controllers;

use App\Models\Filtro;
use App\Http\Requests\StoreFiltroRequest;
use App\Http\Requests\UpdateFiltroRequest;
use Inertia\Inertia;
use Inertia\Response;

class FiltroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Filtros');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFiltroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFiltroRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Filtro  $filtro
     * @return \Illuminate\Http\Response
     */
    public function show(Filtro $filtro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Filtro  $filtro
     * @return \Illuminate\Http\Response
     */
    public function edit(Filtro $filtro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFiltroRequest  $request
     * @param  \App\Models\Filtro  $filtro
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFiltroRequest $request, Filtro $filtro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Filtro  $filtro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filtro $filtro)
    {
        //
    }
}
