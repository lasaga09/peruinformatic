<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Producto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                      if(session('idusuario')){

                      $idsede=session('idsede');


     /*lista de productos por sede*/
            
                   if ($idsede == 6) {
                       $datos = Producto::select('productos.idproducto','productos.nombre as producto','marcas.nombre as marca','productos.modelo','colores.nombre as color','productos.descripcion','productos.stock','productos.pantalla_generica','productos.pantalla_original','productos.precio_compra','productos.precio_venta','productos.imagen','categorias.nombre as categoria','sedes.nombre as sede')
                       ->join('marcas', 'marcas.idmarcas', '=', 'productos.id_marca')
                       ->join('colores', 'colores.idcolores', '=', 'productos.id_color')
                       ->join('categorias', 'categorias.idcategoria', '=', 'productos.id_categoria')
                       ->join('sedes', 'sedes.idsede', '=', 'productos.id_sede')->get();
                   }else{
                       $datos = Producto::select('productos.idproducto','productos.nombre as producto','marcas.nombre as marca','productos.modelo','colores.nombre as color','productos.descripcion','productos.stock','productos.pantalla_generica','productos.pantalla_original','productos.precio_compra','productos.precio_venta','productos.imagen','categorias.nombre as categoria','sedes.nombre as sede')
                       ->join('marcas', 'marcas.idmarcas', '=', 'productos.id_marca')
                       ->join('colores', 'colores.idcolores', '=', 'productos.id_color')
                       ->join('categorias', 'categorias.idcategoria', '=', 'productos.id_categoria')
                       ->join('sedes', 'sedes.idsede', '=', 'productos.id_sede')->where('id_sede',$idsede)->get();

                     
                   

                   }

                       $marca = DB::table('marcas')->get();
                       $color = DB::table('colores')->get();
                       $categoria = DB::table('categorias')->get();

                        
                      
                      return view('Producto.index',compact('datos','marca','color','categoria')); 
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenes/',$name);

        }else{

           $name='';
         }
            $producto = new Producto();
             $producto->nombre=$request->producto;
             $producto->id_marca=$request->marca;
             $producto->modelo=$request->modelo;
             $producto->id_color=$request->color;
             $producto->stock=$request->stock;
             $producto->pantalla_generica=$request->generica;
             $producto->pantalla_original=$request->original;
             $producto->precio_compra=$request->compra;
             $producto->precio_venta=$request->venta;
             $producto->imagen=$name;
             $producto->id_categoria=$request->categoria;
             $producto->id_sede=$request->idsede;
             $producto->save();

    
         return 'Producto agregado';

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto,$id)
    {
         $datos = $producto::find($id);


        return $datos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Producto $producto,$id)
    {
       
         $datos = Producto::select('productos.idproducto','productos.nombre as producto','marcas.nombre as marca','productos.modelo','colores.nombre as color','productos.descripcion','productos.stock','productos.pantalla_generica','productos.pantalla_original','productos.precio_compra','productos.precio_venta','productos.imagen','categorias.nombre as categoria','sedes.nombre as sede')
                       ->join('marcas', 'marcas.idmarcas', '=', 'productos.id_marca')
                       ->join('colores', 'colores.idcolores', '=', 'productos.id_color')
                       ->join('categorias', 'categorias.idcategoria', '=', 'productos.id_categoria')
                       ->join('sedes', 'sedes.idsede', '=', 'productos.id_sede')->where('idproducto',$id)->get();


        return $datos[0];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto,$id)
    {
    if($request->hasFile('imagen')){
     return 'si';
    }
    return 'no';
    



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto,$id)
    {
        $datos = $producto::find($id);
         $file_path = public_path().'/imagenes/'.$datos->imagen;
        \File::delete($file_path);
        $datos->delete();
        return 'Producto eliminado';
    }
}
