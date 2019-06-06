<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\Reparacion;
use App\DetalleReparacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReparacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     if(session('idusuario')){

        if (session('idsede')==6) {
             $datos = Reparacion::select('reparaciones.idreparacion','reparaciones.numero','clientes.nombre as cliente','reparaciones.celular','sedes.nombre as sede','usuarios.nombre as usuario','reparaciones.fecha_recepcion','reparaciones.fecha_finalizada','reparaciones.estado','reparaciones.cuenta','reparaciones.saldo','reparaciones.total')
        ->join('clientes','clientes.idcliente','=','reparaciones.id_cliente')
        ->join('sedes','sedes.idsede','=','reparaciones.id_sede')   
        ->join('usuarios','usuarios.idusuario','=','reparaciones.id_usuario')
        ->get(); 
        }else{
             $datos = Reparacion::select('reparaciones.idreparacion','reparaciones.numero','clientes.nombre as cliente','reparaciones.celular','sedes.nombre as sede','usuarios.nombre as usuario','reparaciones.fecha_recepcion','reparaciones.fecha_finalizada','reparaciones.estado','reparaciones.cuenta','reparaciones.saldo','reparaciones.total')
        ->join('clientes','clientes.idcliente','=','reparaciones.id_cliente')
        ->join('sedes','sedes.idsede','=','reparaciones.id_sede')   
        ->join('usuarios','usuarios.idusuario','=','reparaciones.id_usuario')
        ->where('reparaciones.id_sede',session('idsede'))
        ->get(); 

        }

        $clientes=Cliente::all();
        $marcas = DB::table('marcas')->get();

              $totalRegistros=Reparacion::all()->where('id_sede',session('idsede'))->count();
              $totalre=$totalRegistros + 1;

     
     return view('Reparacion.index',compact('datos','clientes','marcas','totalre')); 
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
        
 
       try {
        DB::beginTransaction();
       /*insertamos compra*/

        $compra = request()->validate([
            'cliente'=>'required',
            'celular'=>'required'
        ],[
        'cliente.required'=>'campo obligatorio'  
    
        ]);

            $reparacion = new Reparacion();
            $reparacion->numero=$request->numero;
            $reparacion->id_cliente=$request->cliente;
            $reparacion->celular=$request->celular;
            $reparacion->id_sede=$request->sede;
            $reparacion->id_usuario=$request->usuario;
            $reparacion->cuenta=$request->cuenta;
            $reparacion->saldo=$request->saldo;
            $reparacion->total=$request->total;
             $reparacion->save();

       

     
       /*guardamos en variables el detalle*/
        $equipo=$request->equipo;
        $marca=$request->marca;
        $descripcion=$request->descripcion;
        $falla=$request->fallas;
        $cantidad=$request->cantidad;
        $precio=$request->precio;
        $subtotal=$request->subtotal;
        $cont=0;/*contador para el bucle*/

        /*condicion para el array de detalles que viene po request*/
        while($cont < count($marca)){
           $datos = new DetalleReparacion();
           $datos->id_reparacion=$reparacion->idreparacion;
           $datos->equipo=$equipo[$cont];
           $datos->id_marca=$marca[$cont];
           $datos->observacion=$descripcion[$cont];
           $datos->falla=$falla[$cont];
           $datos->cantidad=$cantidad[$cont];;
           $datos->subtotal=$subtotal[$cont];
           $datos->precio=$precio[$cont];
           $datos->save();
           $cont=$cont+1;

        }
        DB::commit();

           
       } catch (Exception $e) {
           DB::rollback();
       }
        
        return redirect()->route('Reparacion.index')->with('status', 'Reparacion Registrada');;



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reparacion  $reparacion
     * @return \Illuminate\Http\Response
     */
    public function show(Reparacion $reparacion,$id)
    {
        $datos = $reparacion::find($id);

        return $datos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reparacion  $reparacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Reparacion $reparacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reparacion  $reparacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reparacion $reparacion,$id)
    {
        $fecha  = date('Y-m-d H:i:s');
        $estado = 1;
        $cuenta = 0.0;
        $saldo  =0.0;



              $datos =$reparacion::find($id);
              $datos->fecha_finalizada =$fecha;
              $datos->estado =$estado;
              $datos->cuenta =$cuenta;
              $datos->saldo =$saldo;
              $datos->save();


        
        return 'Reparacion finalizada';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reparacion  $reparacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reparacion $reparacion,$id)
    {

        $datos = $reparacion::find($id);
        $datos->delete();
        return 'Reparacion eliminada';
    }
}
