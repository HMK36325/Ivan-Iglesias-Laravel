<?php

namespace App\Http\Controllers;

use App\Models\Suscripciones;
use Illuminate\Http\Request;

class SuscripcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['administrador']);
        $suscripciones = Suscripciones::all();
        foreach($suscripciones as $sus){
        return view('suscripciones.index', compact('suscripciones'));
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suscripciones  $suscripciones
     * @return \Illuminate\Http\Response
     */
    public function show(Suscripciones $suscripciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suscripciones  $suscripciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Suscripciones $suscripciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suscripciones  $suscripciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suscripciones $suscripciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suscripciones  $suscripciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suscripciones $suscripciones)
    {
        //
    }
}
