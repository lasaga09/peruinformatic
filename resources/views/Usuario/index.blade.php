
@extends('Plantilla3.index')
@section('subItem','Gestionar/Usuarios')

@section('nombre')
	{{session('usuario')}}
@endsection

@section('rol')
	{{session('rol')}}
@endsection
@section('sede')

	{{session('sede')}}
@endsection

@section('contenido')


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus-circle" aria-hidden="true"></i>
  Nuevo
</button>
<br><br>






<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalCenterTitle"> <i class="fa fa-file" aria-hidden="true"></i></h5>
        <button type="button" class="close" id="cerraradd" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

       <form id="frmadd">
            <div class="modal-body">
           {{--  
            <meta name="token" content="{{ csrf_token() }}"> --}}

            <input type="text" name="" id="token" hidden="" value="{{ csrf_token() }}">
            
            <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="nombre" required="">
            <small id="categoriaValidacion" class="form-text text-muted"></small>
            </div>

            <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp" placeholder="usuario" required="">
            <small id="categoriaValidacion" class="form-text text-muted"></small>
            </div>

             <div class="form-group">
		    <label for="usuario">Password</label>
			<div class="input-group">
			
			<input type="password" class="form-control" id="password" placeholder="password"><div class="input-group-prepend">
			<div class="input-group-text" id='ver'><i class="fa fa-eye" aria-hidden="true"></i></div>
			<div class="input-group-text" id="ocultar" style="display: none"><i class="fa fa-eye-slash" aria-hidden="true"></i></div>
			</div>

			</div>
	         <small id="categoriaValidacion" class="form-text text-muted"><strong id="mpas"></strong></small>
            </div>

         
      


             <div class="form-group">
            <label for="rpassword">Seleccione Rol</label><br>
				<select name="rol" id="rol" style="width: 50%">
 					@foreach ($rol as $t)
 						<option value="{{$t->idrol}}">{{$t->rol}}</option>
 					@endforeach
				
				</select>
         
            </div>
           

            
           @if (session('idsede') == 6)
              <div class="form-group">
            <label for="rpassword">Seleccione Sede</label><br>
              <select name="sede" id="sede" style="width: 50%">
              @foreach ($sede as $t)
              <option value="{{$t->idsede}}">{{$t->nombre}}</option>
              @endforeach
              
              </select>
            </div>
           @else

         <input type="text" name="sede" id="sede" hidden="" value=" {{session('idsede')}}">


           @endif

          
            
           
            
            <button type ="button" class="btn btn-success" id="btnAdd"><i class="fa fa-floppy-o" aria-hidden="true"> Guardar</i></button>
            
            </div>
     
      </form>

    

    </div>
  </div>
</div>


<!-- Modal edit-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalCenterTitle"> <i class="fa fa-file" aria-hidden="true"></i> Edit</h5>
        <button type="button" class="close" id="cerrarEdit" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

       <form id="frmup">
            <div class="modal-body">
           {{--  
            <meta name="token" content="{{ csrf_token() }}"> --}}

            <input type="text" name="" id="tokenup" hidden="" value="{{ csrf_token() }}">
            <input type="text" name="" id="idusuarioup" hidden="">
            
            <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombreup" name="categoria" aria-describedby="emailHelp" placeholder="nombre" required="">
            <small id="categoriaValidacion" class="form-text text-muted"></small>
            </div>

            <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" id="usuarioup" name="categoria" aria-describedby="emailHelp" placeholder="usuario" required="">
            <small id="categoriaValidacion" class="form-text text-muted"></small>
            </div>

             <div class="form-group">
		    <label for="usuario">Password</label>
			<div class="input-group">
			
			<input type="password" class="form-control" id="passwordup" placeholder="password"><div class="input-group-prepend">
			<div class="input-group-text" id='verup'><i class="fa fa-eye" aria-hidden="true"></i></div>
			<div class="input-group-text" id="ocultarup" style="display: none"><i class="fa fa-eye-slash" aria-hidden="true"></i></div>
			</div>

			</div>
	         <small id="categoriaValidacion" class="form-text text-muted"><strong id="mpasup"></strong></small>
            </div>

         
      


             <div class="form-group">
            <label for="rpassword">Seleccione Rol</label><br>
				<select name="rolup" id="rolup" style="width: 50%">
 					@foreach ($rol as $t)
 						<option value="{{$t->idrol}}">{{$t->rol}}</option>
 					@endforeach
				
				</select>
         
            </div>
           

                  @if (session('idsede') == 6)
            <div class="form-group">
            <label for="rpassword">Seleccione Sede</label><br>
							<select name="sedeup" id="sedeup" style="width: 50%">
							@foreach ($sede as $t)
							<option value="{{$t->idsede}}">{{$t->nombre}}</option>
							@endforeach
							
							</select>
            </div>
            @else
            <input type="text" name="sedeup" id="sedeup" hidden="" value="{{session('idsede')}}">

            @endif

            
            
           
            
            <button type ="button" class="btn btn-success" id="btnUpdate"><i class="fa fa-floppy-o" aria-hidden="true"> Actualizar</i></button>
            
            </div>
     
      </form>

    

    </div>
  </div>
</div>


	


{{-- modelo tabla --}}
<div class="table-responsive">
<table class="table table-hover" id="tableData">
 <thead class="thead" style="background: #1E3E8B;color:#fff">
    <tr>
      {{-- <th scope="col">#</th> --}}
      <th scope="col">Nombre</th>
      <th scope="col">Usuario</th>
       <th scope="col">Rol</th>
       @if (session('idsede')==6)
         <th scope="col">Sede</th>
       @endif
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody id="tableb">  
  @foreach ($datos as $value)
   <tr>
      {{-- <td scope="row">{{$value->idusuario}}</td> --}}
      <td data-label='Nombre'>{{$value->nombre}}</td>
      <td data-label='Usuario'>{{$value->usuario}}</td>
      <td data-label='Rol'>{{$value->rol}}</td>
     @if (session('idsede')==6)
        <td data-label='Sede'>{{$value->sede}}</td>
     @endif
      <td data-label='Acciones'>
       
       <button data-toggle ="modal" class="btn btn-warning"  data-target="#edit" id="btnEdit" iduser=' {{$value->idusuario}}'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
       <button id="btnDelete" class="btn btn-danger" tokende="{{ csrf_token() }} "  idcateDel=" {{$value->idusuario}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>

       <button id="btnPermiso" class="btn btn-info" tokende="{{ csrf_token() }} "  iduserper=" {{$value->idusuario}}" usuario="{{$value->usuario}}"><i class="fa fa-cog" aria-hidden="true"></i></button>
    </td>
    
    </tr> 

     @endforeach 
  </tbody>
</table>
</div>

@endsection


@section('contenido-derecho')

<br><br><br><br>

<div class="alert alert-dismissible fade show" role="alert" style="background: #1E3E8B;color: #fff;display: none" id="TitlePer">
  <strong>OTORGAR PERMISOS!</strong> 
  <button type="button" class="close" style="color: #fff">
    <span aria-hidden="true"><i class="fa fa-check-square-o" aria-hidden="true"></i></span>
  </button>
</div>

<div class="card text-white mb-3" style="max-width: 100%;background: #688CAE;display: none" id="cardPermisos">
  <div class="card-header text-center" id="divnombre" style="color: #fff;font-size: 22px;font-weight: 600"></div>
  <div class="card-body">
    <div style="display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: repeat(6,1fr);
  margin:5px;

  
  width: 100%;
  height:155px;
  background:;">
  
    <div>Reparacion <br>
     <input type="checkbox" name=""  id="ckcategoria">
    </div>


    <div>Clientes <br>
     <input type="checkbox" name="" value="" id="ckcliente">
    </div>

    <div>Proveedores <br>
     <input type="checkbox" name="" id="ckproveedor">

    </div>

    <div style="height: 1px; width:100%;background: #f6f5f5;"></div>

    <div style="height: 1px; width:100%;background:  #f6f5f5;"></div>

    <div style="height: 1px; width:100%;background:  #f6f5f5;"></div>

    <div>Productos <br>
     <input type="checkbox" name="" id="ckproducto">

    </div>


    <div>Compras <br>
     <input type="checkbox" name="" id="ckcompra">
    </div>

    <div>Venta <br>
     <input type="checkbox" name="" id="ckventa">
    </div>

 <div style="height: 1px; width:100%;background:  #f6f5f5;"></div>

    <div style="height: 1px; width:100%;background:  #f6f5f5;"></div>
    
    <div style="height: 1px; width:100%;background:  #f6f5f5;"></div>
    <div>Consultas <br>
     <input type="checkbox" name="" id="ckconsulta">
    </div>

    <div>Reportes <br>
     <input type="checkbox" name="" id="ckreporte">
    </div>

    <div>Libre <br>
     <input type="checkbox" name="">
    </div>
   
     <div></div>
      <div></div>
       <div></div>
       <input type="text" name="" id="idusuarioactualizar" hidden="">
       <input type="" name="" id="token" value="{{ csrf_token() }}" hidden="">
     <button id="btnUpdatePermiso"  style="grid-column: span 3;background:#fff;border-radius: 5px;cursor: pointer;color: #000;font-weight: 600"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar Cambios</button>

  </div>
</div>

@endsection




@section('scripts')
 <script type="text/javascript" src="js/usuario.js"></script>
  <script type="text/javascript" src="js/permiso.js"></script>
  
@endsection