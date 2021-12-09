<?php

namespace App\Http\Controllers;

use App\Models\Canil;
use App\Http\Requests\StoreCanilRequest;
use App\Http\Requests\UpdateCanilRequest;

class CanilController extends Controller
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
     * @param  \App\Http\Requests\StoreCanilRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCanilRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Canil  $canil
     * @return \Illuminate\Http\Response
     */
    public function show(Canil $canil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Canil  $canil
     * @return \Illuminate\Http\Response
     */
    public function edit(Canil $canil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCanilRequest  $request
     * @param  \App\Models\Canil  $canil
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCanilRequest $request, Canil $canil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Canil  $canil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Canil $canil)
    {
        //
    }
}
