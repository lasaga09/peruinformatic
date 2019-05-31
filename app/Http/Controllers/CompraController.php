<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Proveedor;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(session('idusuario')){
             $datos = Compra::select('compras.idcompras','compras.numerocompra','compras.fecha_compra','compras.total','proveedores.nombre as proveedor','sedes.nombre as sede','usuarios.nombre as usuario')
             ->join('proveedores', 'proveedores.idproveedor', '=', 'compras.id_proveedor')
             ->join('sedes', 'sedes.idsede', '=', 'compras.id_sede')
             ->join('usuarios', 'usuarios.idusuario', '=', 'compras.id_usuario')
             ->get();

             $proveedor = Proveedor::all();

              $ultimoids=Compra::orderby('idcompras','DESC')->take(1)->get();
              if($ultimoids->isEmpty()){
              $ultimoid=1;
              }else{
              $ultimoid=$ultimoids[0]->idcompras + 1;
              }
         
                     return view('Compras.index',compact('datos','proveedor','ultimoid')); 
                     }      
                     return redirect()->route('Login.index');
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
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
