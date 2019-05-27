<?php

namespace App\Http\Controllers;


use App\Usuario;
use  App\Permiso;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PermisoController extends Controller
{
	 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permiso $permiso,$id){
    	  $per = Permiso::where('id_usuario',$id)->get();
    	  $d=$per[0];
          $d->pcategoria=$request->categoria;
          $d->pcliente=$request->cliente;
          $d->pproveedores=$request->proveedor;
          $d->pproductos=$request->producto;
          $d->pventa=$request->venta;
          $d->pcompra=$request->compra;
          $d->preporte=$request->reporte;
          $d->pconsultas=$request->consulta;
          $d->save();
     
    	return 'Permisos Actualizados';
    }

    public function show($id){

         $datos = Permiso::where('id_usuario',$id)->get();

    	return $datos[0];
    }
}
