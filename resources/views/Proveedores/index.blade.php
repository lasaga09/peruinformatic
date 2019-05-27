
@extends('Plantilla3.index')
@section('subItem','Proveedores')

@section('nombre')
	{{session('usuario')}}
@endsection

@section('rol')
	{{session('rol')}}
@endsection
@section('sede')

	{{session('sede')}}
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="css/proveedor.css">

@endsection

@section('contenido')




<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addpr"><i class="fa fa-plus-circle" aria-hidden="true"></i>
  Nuevo
</button>
<br><br>

<!-- Modal -->
<div class="modal fade" id="addpr" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalCenterTitle"> <i class="fa fa-file" aria-hidden="true"></i> NUEVO PROVEEDOR</h5>
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
            <label for="Nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="Nombre" required="">
            </div>

			<div class="form-group">
			<label for="ruc">Ruc</label>
			<input type="number" class="form-control" id="ruc" name="ruc" aria-describedby="emailHelp" placeholder="ruc" required="">
			</div>

			<div class="form-group">
			<label for="telefono">Telefono</label>
			<input type="number" class="form-control" id="telefono" name="telefono" aria-describedby="emailHelp" placeholder="telefono" required="">
			</div>

			<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="email" required="">
			</div>

			<div class="form-group">
			<label for="direccion">Direccion</label>
			<input type="direccion" class="form-control" id="direccion" name="direccion" aria-describedby="emailHelp" placeholder="direccion" required="">
			 <small id="telefono" class="form-text text-muted">campo opcional</small>
			</div>
			<input type="text" name="" id="idsede" hidden="" value="" idsede='{{session('idsede')}}'>




            <button type ="button" class="btn btn-success" id="btnAdd"><i class="fa fa-floppy-o" aria-hidden="true"> Guardar</i></button>
            
            </div>
     
      </form>

    

    </div>
  </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="editpr" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalCenterTitle"> <i class="fa fa-file" aria-hidden="true"></i> EDITAR PROVEEDOR</h5>
        <button type="button" class="close" id="cerrarEdit" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

       <form id="frmadd">
            <div class="modal-body">
           {{--  
            <meta name="token" content="{{ csrf_token() }}"> --}}

            <input type="text" name="" id="tokenup" hidden="" value="{{ csrf_token() }}">
            
            <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" class="form-control" id="nombreup" name="nombre" aria-describedby="emailHelp" placeholder="Nombre" required="">
            </div>

			<div class="form-group">
			<label for="ruc">Ruc</label>
			<input type="number" class="form-control" id="rucup" name="ruc" aria-describedby="emailHelp" placeholder="ruc" required="">
			</div>

			<div class="form-group">
			<label for="telefono">Telefono</label>
			<input type="number" class="form-control" id="telefonoup" name="telefono" aria-describedby="emailHelp" placeholder="telefono" required="">
			</div>

			<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="emailup" name="email" aria-describedby="emailHelp" placeholder="email" required="">
			</div>

			<div class="form-group">
			<label for="direccion">Direccion</label>
			<input type="direccion" class="form-control" id="direccionup" name="direccion" aria-describedby="emailHelp" placeholder="direccion" required="">
			
			</div>
			<input type="text" name="" id="idsedeup" hidden="" >
			<input type="text" name="" id="idproveedorup" hidden="" >




            <button type ="button" class="btn btn-success" id="btnUp"><i class="fa fa-floppy-o" aria-hidden="true"> Actualizar</i></button>
            
            </div>
     
      </form>

    

    </div>
  </div>
</div>










{{-- tabla --}}
<div class="table-responsive">
<table class="table table-hover" id="tableData">
 <thead class="thead-dark">
    <tr>
     
      <th scope="col">Nombre</th>
      <th scope="col">Ruc</th>
      <th scope="col">Telefono</th>
       <th scope="col">Direccion</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody id="tableb">  
  @foreach ($datos as $value)
   <tr>
    
      <td data-label="Nombre">{{$value->nombre}}</td>
      <td data-label="Ruc">{{$value->ruc}}</td>
      <td data-label="Telefono">{{$value->telefono}}</td>
      <td data-label="Direccion">{{$value->direccion}}</td>
      <td>
       
		<button data-toggle ="modal" class="btn btn-warning"  data-target="#editpr" id="btnEdit" idpro='{{$value->idproveedor}}'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>

		<button id="btnDelete" class="btn btn-danger" tokende="{{ csrf_token() }} "  idcateDel="{{$value->idproveedor}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
		
		<button id="btnDetalles" class="btn btn-info" iddetalle="{{$value->idproveedor}}"><i class="fa fa-eye" aria-hidden="true"></i></button>
		</td>
    </tr> 
     @endforeach 
  </tbody>
</table>
</div>


	

@endsection


@section('contenido-derecho')

<br><br><br><br>

   
 


		<div class="card text-center" id="cardDetalle" style="display: none" >
		<div class="card-header" style="background:">
		Detalles
		<button type="button" class="close" id="btncloseDe">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="card-body" style="background:">

				<div><span></span> <b style="font-size: 20px;color: " class="" id="nombredeta"></b style="font-size: 20px;color:"></div>
				<div><span style="color: ">Ruc:       </span> <span class="" id="rucdeta"></span></div>
				<div><span style="color: ">Telefono:  </span> <span class="" id="telefonodeta"></span></div>
				<div><span style="color: ">Direccion: </span> <span class="" id="direcciondeta"></span></div>
		
		</div>
		<div class="card-footer text-muted">
		<span id="emaildeta" ></span>
		</div>
		</div>

  

@endsection




@section('scripts')
 <script type="text/javascript" src="js/proveedor.js"></script>

@endsection