<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                     if(session('idusuario')){
                     $datos = Categoria::all();    
                     return view('Categorias.index',compact('datos')); 
                     }      
                     return redirect()->route('Login.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function create(Request $request)
    {
        $categoria = Categoria::all();
        

        return $categoria;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
         
         if(empty($request->nombre)){
         return '1';
         }else{
            $categoria = new Categoria();
         $categoria->nombre=$request->nombre;
         $categoria->descripcion=$request->descripcion;
         $categoria->save();

         return 'Categoria agregada correctamente!!!';
         }
        
         






    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria,$id)
    {
         $datos = $categoria::find($id);

        return $datos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria,$id)
    {

            $datos = $categoria::find($id);
            $datos->nombre=$request->nombre;
            $datos->descripcion=$request->descripcion;
            $datos->save();
            
            return 'Categoria Actualizada!!!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria,$id)
    {


        $datos = $categoria::find($id);
        $datos->delete();
        return 'Categoria Eliminado!!!';
    }
}
