<?php

namespace App\Http\Controllers;
use App\Producto;
use App\Reparacion;
use App\Cliente;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class OtroController extends Controller
{
   


   public function Productos(Request $request,$id)
   {

 $productos=Producto::all()->where('id_sede',session('idsede'));


       return view('Compras.index');
	


   }

   public function Telefono($id){

   	$datos = Cliente::find($id);

   	return $datos;

   }


public function Marca($id){

   	$datos = DB::table('marcas')->where('idmarcas',$id)->get();

   	return $datos;

   }

}
