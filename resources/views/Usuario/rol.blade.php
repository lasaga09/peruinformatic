
@extends('Plantilla3.index')
@section('subItem','Gestionar Usuarios')
@section('subItem2','Rol')
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
<br>
<br>


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
            <label for="rol">Rol</label>
            <input type="text" class="form-control" id="rol" name="rol" aria-describedby="emailHelp" placeholder="Rol" required="">
            <small id="categoriaValidacion" class="form-text text-muted"></small>
            </div>
            
            <div class="form-group">
            <label for="descipcion">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" aria-describedby="emailHelp" placeholder="descripcion" required="">
            <small id="telefono" class="form-text text-muted">campo opcional</small>
            </div>
            
            <button type ="button" class="btn btn-success" id="btnAdd"><i class="fa fa-floppy-o" aria-hidden="true"> Guardar</i></button>
            
            </div>
     
      </form>

    

    </div>
  </div>
</div>


	
	<table class="table table-hover" id="tableData">
 <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">descripcion</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody id="tableb">  
  @foreach ($datos as $value)
   <tr>
      <td scope="row">{{$value->idrol}}</td>
      <td>{{$value->rol}}</td>
      <td>{{$value->descripcion}}</td>
      <td>
       
       <button data-toggle ="modal" class="btn btn-warning"  data-target="#edit" id="btnEdit" idcate='{{$value->idrol}}'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
       <button id          ="btnDelete" class="btn btn-danger" tokende="{{ csrf_token() }} "  idcateDel="{{$value->idrol}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
    </td>
      </td>
    </tr> 
     @endforeach 
  </tbody>
</table>

@endsection


@section('contenido-derecho')
<br><br><br><br>

<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Importante!</h4>
  <p>Al eliminar un rol afectara el proceso de usuario con respectivo rol</p>
  <hr>
  <p class="mb-0"><b>Recomendacion  </b> No Elimine un rol si tiene usuarios agregados al rol</p>
</div>
<div class="alert alert-primary" role="alert">
  Revisar  <a href="Usuario" class="alert-link">Usuarios</a>. 
Dale un click para administrar usuarios.
</div>

@endsection




@section('scripts')
 <script type="text/javascript" src="js/rol.js"></script>
@endsection