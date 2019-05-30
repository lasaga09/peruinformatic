<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
class ImagenController extends Controller
{
    


    public function up(Request $request,$id){

    	$producto = Producto::find($id);

    	if($request->hasFile('imagenup')){
            $file=$request->file('imagenup');
            $name=time().$file->getClientOriginalName();
            $producto->imagen=$name;
            $file->move(public_path().'/imagenes/',$name);      

        }else{
    
    }
     $producto->nombre=$request->productoup;
             $producto->id_marca=$request->marcaup;
             $producto->modelo=$request->modeloup;
             $producto->id_color=$request->colorup;
             $producto->stock=$request->stockup;
             $producto->pantalla_generica=$request->genericaup;
             $producto->pantalla_original=$request->originalup;
             $producto->pantalla_alternativo=$request->alternativoup;
             $producto->precio_compra=$request->compraup;
             $producto->precio_venta=$request->ventaup;
             $producto->precio_descuento=$request->descuentoup;
             $producto->id_categoria=$request->categoriaup;
             $producto->id_sede=$request->idsedeup;
             $producto->save();

    return 'Actualizado';


}



}