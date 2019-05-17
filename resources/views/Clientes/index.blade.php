
@extends('Plantilla3.index')
@section('subItem','Clientes')
@section('subItem2','Administrar')
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
      <th scope="col">Nombre</th>
      <th scope="col">Telefono</th>
      <th scope="col">Email</th>
      <th scope="col">Acciones</th>

    </tr>
  </thead>
  <tbody>
  	@foreach ($datos as $v)
  	  <tr>
      <td data-label="Id">{{$v->idcliente}}</td>
      <td data-label="Nombre">{{$v->nombre}}</td>
      <td data-label="Telefono">{{$v->telefono}}</td>
      <td data-label="Email">{{$v->email}}</td>
      <td data-label="Acciones">

      	<button class=" btn-danger" style="cursor: pointer;border-radius: 2px" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
      	<button  class="btn-warning" style="cursor: pointer;" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>






      	



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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form class="needs-validation" novalidate>
				<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="Nombre" required="">
			
				</div>
				<div class="form-group">
				<label for="telefono">Telefono</label>
				<input type="text" class="form-control" id="telefono" name="telefono" aria-describedby="emailHelp" placeholder="Telefono">
				<small id="telefono" class="form-text text-muted">campo telefono opcional</small>
			
				</div>
				<div class="form-group">
				<label for="email">Email address</label>
				<input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="email" required="">
			
				</div>

				
				
				<button type="submit" class="btn btn-primary">Submit</button>
		</form>
      </div>
      
    </div>
  </div>

</div>

@endsection


@section('contenido-derecho')


@endsection




