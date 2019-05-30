<?php

namespace App\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use App\Usuario;
use App\Rol;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class UsuarioContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

                     if(session('idusuario')){
                    /* $datos = Usuario::all();  */

                          if(session('idsede')==6){
                            $datos = Usuario::select('usuarios.idusuario','usuarios.nombre','usuarios.usuario','roles.rol','sedes.nombre as sede')
                            ->join('roles', 'roles.idrol', '=', 'usuarios.id_rol')
                            ->join('sedes', 'sedes.idsede', '=', 'usuarios.id_sede')
                            ->get();


                          }else{
                            $datos = Usuario::select('usuarios.idusuario','usuarios.nombre','usuarios.usuario','roles.rol','sedes.nombre as sede')
                            ->join('roles', 'roles.idrol', '=', 'usuarios.id_rol')
                            ->join('sedes', 'sedes.idsede', '=', 'usuarios.id_sede')->where('id_sede',session('idsede'))
                            ->get();
                          }





                          $rol=Rol::all();
                         $sede = DB::table('sedes')->get();
                          

                          return view('Usuario.index',compact('datos','rol','sede')); 
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
       $usuario = new Usuario();
       $usuario->nombre=$request->nombre;
       $usuario->usuario=$request->usuario;
       $usuario->password=encrypt($request->password);
       $usuario->id_rol=$request->idrol;
       $usuario->id_sede=$request->idsede;
       $usuario->save();

      return 'Usuario Registrado!!!';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    

        $datos =Usuario::find($id);
        return $datos;
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

        /*validamos la contraseña vacia para no encriptar*/

        if($request->password == ''){
         $datos = Usuario::find($id);
         $datos->nombre=$request->nombre;
         $datos->usuario=$request->usuario;    
         $datos->id_rol=$request->idrol;
         $datos->id_sede=$request->idsede;
         $datos->save();
         return 'Actualizado correctamente';

        }else{
            /*encriptamos la contraseña modificada*/
        $datos = Usuario::find($id);
         $datos->nombre=$request->nombre;
         $datos->usuario=$request->usuario;
         $datos->password=encrypt($request->password);
         $datos->id_rol=$request->idrol;
         $datos->id_sede=$request->idsede;
         $datos->save();
         return 'Actualizado correctamente';
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datos = Usuario::find($id);
        $datos->delete();
        return 'Eliminado correctamente!!!';
    }
}
