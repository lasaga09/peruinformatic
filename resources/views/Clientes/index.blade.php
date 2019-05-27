
@extends('Plantilla3.index')
@section('subItem','Clientes')

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
	

<button class="btn btn-success" data-toggle="modal" data-target="#newC" style="width: 100px"><i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo</button>
<br>
<br>
<div id='divData' class="table-responsive">
<table class="table table-bordered table-hover " id="tableData">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombres y Apellidos</th>
      <th scope="col">Dni</th>
      <th scope="col">Telefono</th>
      <th scope="col">Acciones</th>

    </tr>
  </thead>
  <tbody>
  	@foreach ($datos as $v)
  	  <tr>
      <td data-label="Id">{{$v->idcliente}}</td>
      <td data-label="Nombres y apellidos">{{$v->nombre}} - {{$v->apellido}} </td>
      <td data-label="Dni">{{$v->dni}}</td>
      <td data-label="Telefono">{{$v->telefono}}</td>
      <td data-label="Acciones">

      	<button class="btn-danger" style="cursor: pointer;border-radius: 2px" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true" id="btnEliminar" token='{{ csrf_token() }}' idcdelete="{{$v->idcliente}}"></i></button>

      	<button id="btnEditarCliete"  idc='{{$v->idcliente}}' class="btn-warning" style="cursor: pointer;" title="Editar" data-toggle="modal" data-target="#editC"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>






      	



      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>





{{-- new clients --}}


<!-- Modal -->
<div class="modal fade" id="newC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Cliente</h5>
        <button type="button" id="btncerrarModal" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
		<form  id="frmCliente" method="POST">
      
   {{-- csrf para ajax --}}
      <meta name="csrf-token" content="{{ csrf_token() }}">
        
				<div class="form-group">
				<label for="nombre">Nombres</label>
				<input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="Nombre" required="">
        </div>


        <div class="form-group">
        <label for="nombre">Apellidos</label>
        <input type="text" class="form-control" id="apellido" name="apellido" aria-describedby="emailHelp" placeholder="Apellidos" required="">
        </div>

        <div class="form-group">
        <label for="nombre">DNI</label>
        <input type="number" class="form-control" id="dni" name="dni" aria-describedby="emailHelp" placeholder="DNI" required >
        </div>

        

				<div class="form-group">
				<label for="telefono">Telefono</label>
				<input type="number" class="form-control" id="telefono" name="telefono" aria-describedby="emailHelp" placeholder="Telefono">
				
			
				</div>
				<div class="form-group">
				<label for="email">Correo Electronico</label>
				<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="email" required="">
        <small id="telefono" class="form-text text-muted">campo email opcional</small>
			
				</div>

				
				
				<button type="button" class="btn btn-primary" id="btnSavec"><i class="fa fa-floppy-o" aria-hidden="true"> Guardar</i></button>
		</form>
      </div>

      
    </div>
  </div>

</div>






<!-- editar -->
<div class="modal fade" id="editC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button"  id="btncerrarModalup" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  id="">
     
  
        <meta name="csrf-tokenup" content="{{ csrf_token() }}">
   
   
      
      <input type="text" name="" id="idcup" hidden="">
        
        <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombrecup" name="nombrecup" aria-describedby="emailHelp" placeholder="Nombre" required="">


        <div class="form-group">
        <label for="nombre">Apellidos</label>
        <input type="text" class="form-control" id="apellidocup" name="apellido" aria-describedby="emailHelp" placeholder="Apellidos" required="">
        </div>

        <div class="form-group">
        <label for="nombre">DNI</label>
        <input type="number" class="form-control" id="dnicup" name="dni" aria-describedby="emailHelp" placeholder="DNI" required >
        </div>

      
        </div>
        <div class="form-group">
        <label for="telefono">Telefono</label>
        <input type="text" class="form-control" id="telefonocup" name="telefonocup" aria-describedby="emailHelp" placeholder="Telefono">
    
      
        </div>
        <div class="form-group">
        <label for="email">Correo Electronico</label>
        <input type="email" class="form-control" id="emailcup" name="emailcup" aria-describedby="emailHelp" placeholder="email" required="">
       
      
        </div>

        
        
        <button type="button" id="btnUpdateCliente"   class="btn btn-primary" id="btnSavec"><i class="fa fa-ravelry" aria-hidden="true"></i> Actualizar</button>
    </form>

        
      </div>
     
    </div>
  </div>
</div>



<!-- Modal editar-->


@endsection


@section('contenido-derecho')


@endsection




@section('scripts')
 <script type="text/javascript" src="js/cliente.js"></script>
@endsection