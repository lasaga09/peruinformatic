<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                     if(session('idusuario')){
                     $datos = Proveedor::all();    
                     return view('Proveedores.index',compact('datos')); 
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

       /*busqueda para ver si el ruc ya se encuentra registrado*/
         $datos = Proveedor::where('ruc',$request->ruc)->get();


        if($datos->isEmpty()){
             $proveedor = new Proveedor();
                $proveedor->nombre =$request->nombre;
                $proveedor->ruc =$request->ruc;
                $proveedor->telefono =$request->telefono;
                $proveedor->email =$request->email;
                $proveedor->direccion =$request->direccion;
                $proveedor->id_sede =$request->idsede;
                $proveedor->save();
                return '1';
       
        }else{
         return '0';
        }

    

  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor,$id)
    {
         $datos = $proveedor::find($id);

        return $datos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor,$id)
    {
        $datos = $proveedor::find($id);

        return $datos;
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor,$id)
    {



        $datos=$proveedor::find($id);
        $datos->nombre =$request->nombre;
        $datos->ruc =$request->ruc;
        $datos->telefono =$request->telefono;
        $datos->email =$request->email;
        $datos->direccion =$request->direccion;
        $datos->id_sede =$request->idsede;
        $datos->save();
        return 'Actualizado correctamente!!!';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor,$id)
    {
          $datos= $proveedor::find($id);
          $datos->delete();

       return 'Eliminado correctamente!!!';
    }
}
