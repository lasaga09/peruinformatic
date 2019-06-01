<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtroController extends Controller
{
   


   public function items(Request $request)
   {

    $productos = array(
                'idcompra'=>$request->idcompra,
                'precio'=>$request->precio,
                'cantidad'=>$request->cantidad,
                'total'=>$request->total
                );

   	return $productos;
   }
}
