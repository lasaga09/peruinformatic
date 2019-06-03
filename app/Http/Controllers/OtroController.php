<?php

namespace App\Http\Controllers;
use App\Producto;

use Illuminate\Http\Request;

class OtroController extends Controller
{
   


   public function Productos(Request $request,$id)
   {

 $productos=Producto::all()->where('id_sede',session('idsede'));


       return view('Compras.index');
	


   }
}
