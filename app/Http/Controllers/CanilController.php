<?php

namespace App\Http\Controllers;

use App\Models\Canil;
use App\Http\Requests\StoreCanilRequest;
use App\Http\Requests\UpdateCanilRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class CanilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Canil', [
            'galgos' => Auth::user()->canils
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCanilRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreCanilRequest $request): RedirectResponse
    {
        try {
            Auth::user()->canils()->create($request->validated());
            return back()->with("success");
        } catch (\Throwable $throwable) {
            dd($throwable);
            return back()->with("error");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCanilRequest  $request
     * @param  Canil  $canil
     * @return RedirectResponse
     */
    public function update(UpdateCanilRequest $request, Canil $canil): RedirectResponse
    {
        $canil->update($request->validated());

        return back()->with("success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Canil  $canil
     * @return RedirectResponse
     */
    public function destroy(Canil $canil): RedirectResponse
    {
        $canil->delete();

        return back()->with("success");
    }
}
