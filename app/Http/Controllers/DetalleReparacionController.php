<?php

namespace App\Http\Controllers;

use App\DetalleReparacion;
use Illuminate\Http\Request;

class DetalleReparacionController extends Controller
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
     * @param  \App\DetalleReparacion  $detalleReparacion
     * @return \Illuminate\Http\Response
     */
    public function show(DetalleReparacion $detalleReparacion,$id)
    {

        $datos = DetalleReparacion::select('*')->where('id_reparacion',$id)->get();
        return $datos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetalleReparacion  $detalleReparacion
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalleReparacion $detalleReparacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetalleReparacion  $detalleReparacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleReparacion $detalleReparacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetalleReparacion  $detalleReparacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetalleReparacion $detalleReparacion)
    {
        //
    }
}
