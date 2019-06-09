<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Proveedor;
use App\Producto;
use App\CompraDetalle;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(session('idusuario')){

        /*condicion de listado de compra x sede y general*/
            if(session('idsede') == 6){
                 $datos = Compra::select('compras.idcompras','compras.numerocompra','compras.fecha_compra','compras.total','proveedores.nombre as proveedor','sedes.nombre as sede','usuarios.nombre as usuario')
                 ->join('proveedores', 'proveedores.idproveedor', '=', 'compras.id_proveedor')
                 ->join('sedes', 'sedes.idsede', '=', 'compras.id_sede')
                 ->join('usuarios', 'usuarios.idusuario', '=', 'compras.id_usuario')
                 ->get();


            }else{
                $datos = Compra::select('compras.idcompras','compras.numerocompra','compras.fecha_compra','compras.total','proveedores.nombre as proveedor','sedes.nombre as sede','usuarios.nombre as usuario')
                 ->join('proveedores', 'proveedores.idproveedor', '=', 'compras.id_proveedor')
                 ->join('sedes', 'sedes.idsede', '=', 'compras.id_sede')
                 ->join('usuarios', 'usuarios.idusuario', '=', 'compras.id_usuario')
                 ->where('compras.id_sede',session('idsede'))
                 ->get();

            }





             $proveedor = Proveedor::all();


               /*ultimo id insertado por sede y sumamos +1 para insertar el siguient serie de compra*/
              $ultimoids=Compra::orderby('idcompras','DESC')->take(1)->get();

             
              if($ultimoids->isEmpty()){
              $idLatest=1;
              }else{
              $idLatest=$ultimoids[0]->idcompras + 1;
              }

              $totalRegistros=Compra::all()->where('id_sede',session('idsede'))->count();
              $ultimoid=$totalRegistros + 1;


             
                
               /*lista de productos por sede*/
           $productos=Producto::select('productos.idproducto','productos.nombre as producto',
                                   'productos.pantalla_generica','productos.pantalla_alternativo','productos.pantalla_original',
                                       'marcas.nombre as marca','productos.modelo','colores.nombre as color')
                             ->join('marcas','marcas.idmarcas','=','productos.id_marca')
                             ->join('colores','colores.idcolores','=','productos.id_color')
                             
                             ->where('id_sede',session('idsede'))->get();


                             
            
                     return view('Compras.index',compact('datos','proveedor','ultimoid','idLatest','productos')); 
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

         $datos = CompraDetalle::select('detalle_compra.cantidad','detalle_compra.id_compra','detalle_compra.generico','detalle_compra.alternativo','detalle_compra.original','detalle_compra.precio','detalle_compra.importe','productos.nombre as producto')
                           ->join('productos','productos.idproducto','=','detalle_compra.id_producto')
                           ->where('id_compra',$request->id)
                           ->get();
        return $datos;

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
        DB::beginTransaction();
       /*insertamos compra*/

        $compra = request()->validate([
            'proveedor'=>'required'
            
        ],[
        'proveedor.required'=>'campo obligatorio'  
    
        ]);

        $compra = new Compra();
        $compra->numerocompra=$request->numero;
        $compra->id_proveedor=$request->proveedor;
        $compra->id_sede=$request->sede;
        $compra->total=$request->total_venta;
        $compra->id_usuario=$request->usuario;
        $compra->save();

     
       /*guardamos en variables el detalle*/
        $idproducto=$request->idproducto;
        $cantidad=$request->cantidad;
        $generico=$request->generico;
        $alternativo=$request->alternativo;
        $original=$request->original;
        $precio=$request->precio;
        $importe=$request->subtotal;
        $cont=0;/*contador para el bucle*/

        /*condicion para el array de detalles que viene po request*/
        while($cont < count($idproducto)){
           $datos = new CompraDetalle();
           $datos->id_compra=$compra->idcompras;
           $datos->id_producto=$idproducto[$cont];
           $datos->cantidad=$cantidad[$cont];
           $datos->generico=$generico[$cont];
           $datos->alternativo=$alternativo[$cont];
           $datos->original=$original[$cont];;
           $datos->precio=$precio[$cont];
           $datos->subtotal=$importe[$cont];
           $datos->save();
           $cont=$cont+1;

        }
        DB::commit();

           
       } catch (Exception $e) {
           DB::rollback();
       }
        
        return redirect()->route('Compra.index')->with('status', 'Compra Registrada');;






    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra,$id)
    {
        $datos = Compra::find($id);
        $datos->delete();
        return 'Compra Eliminada';
    }
}
