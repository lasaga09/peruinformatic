
@extends('Plantilla3.index')
@section('subItem','Categorias')

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







<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalCenterTitle"> <i class="fa fa-file" aria-hidden="true"></i> NUEVA CATEGORIA</h5>
        <button type="button" class="close" id="cerraradd" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

       <form>
            <div class="modal-body">
           {{--  
            <meta name="token" content="{{ csrf_token() }}"> --}}

            <input type="text" name="" id="token" hidden="" value="{{ csrf_token() }}">
            
            <div class="form-group">
            <label for="categoria">Nombre de la categoria</label>
            <input type="text" class="form-control" id="categoria" name="categoria" aria-describedby="emailHelp" placeholder="Nombre" required="">
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


<!-- Modal edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalCenterTitle"> <i class="fa fa-file" aria-hidden="true"></i> EDITAR CATEGORIA</h5>
        <button type="button" class="close" id="cerrarEdit" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

       <form id="frmadd">
            <div class="modal-body">
           {{--  
            <meta name="token" content="{{ csrf_token() }}"> --}}

            <input type="text" name="" id="tokenup" hidden="" value="{{ csrf_token() }}">
            <input type="text" name="" id="idcateup" hidden="">
            
            <div class="form-group">
            <label for="categoria">Nombre de la categoria</label>
            <input type="text" class="form-control" id="categoriaup" name="categoria" aria-describedby="emailHelp" required="">
            <small id="categoriaValidacion" class="form-text text-muted"></small>
            </div>
            
            <div class="form-group">
            <label for="descipcion">Descripcion</label>
            <input type="text" class="form-control" id="descripcionup" name="descripcion" aria-describedby="emailHelp" required="">
      
            </div>
            
            <button type ="button" class="btn btn-success" id="btnUpdate"><i class="fa fa-floppy-o" aria-hidden="true"> Actualizar</i></button>
            
            </div>
     
      </form>

    

    </div>
  </div>
</div>






<br><br>
<table class="table table-hover" id="tableData">
 <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nobre</th>
      <th scope="col">descripcion</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody id="tbody">  
  
        
        @foreach ($datos as $value)
        <tr>
        <td scope="row">{{$value->idcategoria}}</td>
        <td id="tnombre">{{$value->nombre}}</td>
        <td id="tdescripcion">{{$value->descripcion}}</td>
        <td>
        
        <button data-toggle="modal" class="btn btn-warning" ss='66' data-target="#edit" id="btnEdit" idcate='{{$value->idcategoria}}'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
        <button class="btn btn-danger" id="btnDelete" tokende="{{ csrf_token() }} "  idcateDel="{{$value->idcategoria}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
        </td>
        </tr> 
        @endforeach 

   
   
  </tbody>
</table>








@endsection


@section('contenido-derecho')


@endsection




@section('scripts')
 <script type="text/javascript" src="js/categoria.js"></script>

@endsection