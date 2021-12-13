<?php

namespace App\Http\Controllers;

use App\Models\TipoPagamento;
use App\Http\Requests\StoreTipoPagamentoRequest;
use App\Http\Requests\UpdateTipoPagamentoRequest;

class TipoPagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreTipoPagamentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoPagamentoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoPagamento  $tipoPagamento
     * @return \Illuminate\Http\Response
     */
    public function show(TipoPagamento $tipoPagamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoPagamento  $tipoPagamento
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoPagamento $tipoPagamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoPagamentoRequest  $request
     * @param  \App\Models\TipoPagamento  $tipoPagamento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoPagamentoRequest $request, TipoPagamento $tipoPagamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoPagamento  $tipoPagamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoPagamento $tipoPagamento)
    {
        //
    }
}
