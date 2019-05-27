<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Usuario;
use App\Permiso;
use App\CustomCollection;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         Cache::flush();
    return view('login.login');
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
        $user = $request->user;
        $pass = $request->pass;
       /*$userBd=Usuario::all();*/
       $users = Usuario::where('usuario', $user)->get();

        if($users->isEmpty()){
            
                /*redireccion cuado usuario y cotraseña son incorrecta*/

             return redirect()->route('Login.index')->with('status', 'Usuario y contraseña incorrecta!!!');
                }else{
                          
                          foreach ($users as  $value) {
                          
                          $u=$value->usuario;
                          $p= $value->password;
                          $pdes= decrypt($p);
                          
                          
                          /*validacion usuario y pass*/
                          if($u== $user &&  $pdes== $pass){

                                $rol = Usuario::select('roles.rol')
                                ->join('roles', 'roles.idrol', '=', 'usuarios.id_rol')
                                ->where('id_rol',$value->id_rol)
                                ->get();
                                 $nameRol=$rol[0]->rol;
                                 
                                 $sede = Usuario::select('sedes.nombre')
                                ->join('sedes', 'sedes.idsede', '=', 'usuarios.id_sede')
                                ->where('id_sede',$value->id_sede)
                                ->get();
                                $nameSede=$sede[0]->nombre;
                               

                                $permisosget=Permiso::where('id_usuario',$value->idusuario)->get();
                                $permisos=$permisosget[0];

                             
                                 
                                 session(['idusuario' =>$value->idusuario]);
                                session(['usuario' =>$value->nombre]);
                                session(['idrol' =>$value->id_rol]);
                                session(['rol' =>$nameRol]);
                                session(['idsede' =>$value->id_sede]);
                                session(['sede' =>$nameSede]);
                                session(['permisos' =>$permisos]);/*mandamos todos los campos de los permisos*/


                                
                                return redirect()->route('Home.index');
                              
                              
                          
                          
                          }else{
                         return redirect()->route('Login.index')->with('status', 'Contraseña Incorrecta!!!');
                          }
                          
                          
             }
                          
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
