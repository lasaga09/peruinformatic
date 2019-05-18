<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           if(session('idusuario')){


              $datos=Cliente::all();
             
           

          return view('Clientes.index',compact('datos'));
          
          }
          
          return redirect()->route('index');

          }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'respondido';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

               
           try {
            $cliente = new Cliente();

               
               $cliente->nombre = $request->nombre;
               $cliente->telefono = $request->telefono;
               $cliente->email = $request->email;       
               $cliente->save();
               return 'Cliente agregado correctamente!!!';
               
           } catch (Exception $e) {
              
              return 'error'.$e;
              
           }



    

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
         $users = Cliente::where('idcliente', $id)->get();



        return $users;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                 /*buscamos el cliente con el usuario*/
                 $datos=Cliente::where('idcliente',$id)->FirstOrFail();
               
                
               $datos->nombre = $request->nombre;
               $datos->telefono = $request->telefono;
               $datos->email = $request->email;       
               $datos->save();

               return 'slslfjlds';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
