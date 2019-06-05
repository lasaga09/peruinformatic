<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\Reparacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReparacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     if(session('idusuario')){

        if (session('idsede')==6) {
             $datos = Reparacion::select('reparaciones.idreparacion','reparaciones.numero','clientes.nombre as cliente','reparaciones.celular','sedes.nombre as sede','usuarios.nombre as usuario','reparaciones.fecha_recepcion','reparaciones.fecha_finalizada','reparaciones.estado','reparaciones.cuenta','reparaciones.saldo','reparaciones.total')
        ->join('clientes','clientes.idcliente','=','reparaciones.id_cliente')
        ->join('sedes','sedes.idsede','=','reparaciones.id_sede')   
        ->join('usuarios','usuarios.idusuario','=','reparaciones.id_usuario')
        ->get(); 
        }else{
             $datos = Reparacion::select('reparaciones.idreparacion','reparaciones.numero','clientes.nombre as cliente','reparaciones.celular','sedes.nombre as sede','usuarios.nombre as usuario','reparaciones.fecha_recepcion','reparaciones.fecha_finalizada','reparaciones.estado','reparaciones.cuenta','reparaciones.saldo','reparaciones.total')
        ->join('clientes','clientes.idcliente','=','reparaciones.id_cliente')
        ->join('sedes','sedes.idsede','=','reparaciones.id_sede')   
        ->join('usuarios','usuarios.idusuario','=','reparaciones.id_usuario')
        ->where('reparaciones.id_sede',session('idsede'))
        ->get(); 

        }

        $clientes=Cliente::all();
        $marcas = DB::table('marcas')->get();

     
     return view('Reparacion.index',compact('datos','clientes','marcas')); 
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
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reparacion  $reparacion
     * @return \Illuminate\Http\Response
     */
    public function show(Reparacion $reparacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reparacion  $reparacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Reparacion $reparacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reparacion  $reparacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reparacion $reparacion,$id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reparacion  $reparacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reparacion $reparacion)
    {
        //
    }
}
