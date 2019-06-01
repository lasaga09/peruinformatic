
@extends('Plantilla3.index')
@section('subItem','Compras')

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
	<link rel="stylesheet" type="text/css" href="css/compra.css">
@endsection

@section('contenido-header')
<input type="text" name="ultimoid" id="ultimoid"  value="{{$ultimoid}}">


	
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Listado</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Nuevo</a>
    
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">


  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  

<br>
<div class="table-responsive">



{{-- modelo tabla --}}
<table class="table table-hover" id="tableData">
 <thead class="" style="background: #1E3E8B;color: #fff">
    <tr>
		<th scope="col">#</th>
		<th scope="col">Proveedor</th>
		<th scope="col">Fecha</th>
		<th scope="col">Total</th>
		<th scope="col">Empleado</th>
		<th scope="col">Sede</th>
		
		<th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody id="tableb">  
		@foreach ($datos as $value)
		<tr>
		<td scope="row">{{$value->numerocompra}}</td>
		<td>{{$value->proveedor}}</td>
		<td>{{$value->fecha_compra}}</td>
		<td>{{$value->total}}</td>
		<td>{{$value->usuario}}</td>
		<td>{{$value->sede}}</td>

		<td>
		
		<button data-toggle ="modal" class="btn btn-secondary"  data-target="#edit" id="btnEdit" idcate='{{$value->idcompras}}'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>

		<button id="btnDelete" class="btn btn-secondary" tokende="{{ csrf_token() }} "  idcateDel="{{$value->idcompras}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>

		<button id="btnDelete" class="btn btn-secondary" tokendeta="{{ csrf_token() }} "  iddeta="{{$value->idcompras}}"><i class="fa fa-eye" aria-hidden="true"></i></button>


		</td>
	    </tr> 
		@endforeach

  </tbody>
</table>


</div>


  </div>


				<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
				
				
				
				{{-- agregar compra --}}
				<form>
				
				{{--  
				<meta name="token" content="{{ csrf_token() }}"> --}}
				
				<input type="text" name="" id="token" hidden="" value="{{ csrf_token() }}">
			
				<br>
				<div class="row" style="border:1px #CCCACA solid;padding:10px;-webkit-box-shadow: 0 0 8px 2px #1499FF;
                  box-shadow: 0 0 8px 2px #1499FF;background:;">
				
				<div class="col-6 col-sm-2">

						<div class  ="input-group mb-3">
						<input type ="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" id="numero" name="numero" disabled="">
						</div>
				</div>

				<div class="col-6 col-sm-4">
					<div class  ="input-group mb-3">
					<input type="text" name="proveedor" id="proveedor" hidden="">{{-- idproveddor --}}
					<input type ="text" class="form-control" placeholder="Proveedor" aria-label="proveedor" aria-describedby="basic-addon1" disabled="" id="verproveedor">
					<div class  ="input-group-prepend">
					<span class ="input-group-text" id="basic-addon1">
					 <i class="fa fa-search" aria-hidden="true" id="BuscarProve" data-toggle="modal" data-target="#modalProve" style="cursor: pointer;"></i>
					</span>
					</div>
					</div>
				</div>
				{{-- idsede --}}
				<input type="text" name="sede" id="sede" hidden="" value="{{session('idsede')}}">
				<input type="text" name="usuario" id="usuario" hidden="" value="{{session('idusuario')}}">

					<div class="col-12 col-sm-6">

						<div class  ="input-group mb-3">
						<input type ="text" class="form-control" placeholder="Direccion" aria-label="Username" aria-describedby="basic-addon1" id="direccion" name="direccion" >
						</div>
				</div>

                     {{-- div productos --}}
					<div class ="container" style="border:1px #CCCACA solid;padding:10px;width: 100%">
					
						<div class="row">
                              	<input type="text" name="idcompra" id="idcompra" hidden="" value="{{$idLatest}}">
								<div class="col-6 col-sm-6">
								<div class  ="input-group mb-3">
								<input type="text" name="producto" id="producto" hidden="">{{-- idproducto --}}
								<input type ="text" class="form-control" placeholder="Producto" aria-label="proveedor" aria-describedby="basic-addon1" disabled="" id="verproducto">
								<div class  ="input-group-prepend">
								<span class ="input-group-text" id="basic-addon1">
								<i class="fa fa-search" aria-hidden="true" id="BuscarProduct" data-toggle="modal" data-target="#modalProve" style="cursor: pointer;"></i>
								</span>
								</div>
								</div>
								</div>
								
								{{-- generico --}}
							<div class="col-2 col-sm-2">
									<div class  ="input-group mb-3">
									<input type="number" name="generico" id="generico" class="form-control" placeholder="generico">
									</div>
							</div>
							<div class="col-2 col-sm-2">
									<div class  ="input-group mb-3">
									<input type="number" name="alternativo" id="alternativo" class="form-control" placeholder="alternativo">
									</div>
							</div>

							<div class="col-2 col-sm-2">
									<div class  ="input-group mb-3">
									<input type="number" name="original" id="original" class="form-control" placeholder="original">
									</div>
							</div>
								
						
						</div>

						<div class="row">

							<div class="col-6 col-sm-6">
							<div class  ="input-group mb-3">
							<input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="descripcion">
							</div>
							</div>

							<div class="col-6 col-sm-2">
							<div class  ="input-group mb-3">
							<input type="number" name="precio" value="" id="precio" placeholder="precio" class="form-control">
							</div>
							</div>
							

							<div class="col-6 col-sm-2">
							<div class  ="input-group mb-3">
							<input type="number" name="cantidad" id="cantidad" placeholder="cantidad" class="form-control" value="">
							</div>
							</div>


							<div class="col-6 col-sm-2">
							<div class  ="input-group mb-3">
							<input type="number" name="subtotal" id="subtotal" placeholder="total" class="form-control" disabled="">
							</div>
							</div>


							

						</div>


						<button type ="button" class="btn btn-success" id="btnaddItem"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>

					</div>
					<div class="m-2"></div>
					




					{{-- tabla items --}}

					<div class="container">

						<table class="table">
						<thead class="thead-dark">
						<tr>
						<th scope="col">Producto</th>
						<th scope="col">Cantidad</th>
						<th scope="col">Subtotal</th>
						<th scope="col">Acciones</th>
						</tr>
						</thead>
						<tbody id="tbody">

						
							
								
							
				
					


						</tbody>
						</table>

					</div>

     {{-- header compra --}}
		<div class ="container" style="border:1px #CCCACA solid;padding:10px;width: 100%">

				<button type ="button" class="btn btn-success" id="btnAdd"><i class="fa fa-floppy-o" aria-hidden="true"> Guardar</i></button>
				
        </div>
				

				</div>



			
				
				</form>
				</div>

 
</div>







<!-- Modal proveedor -->

<div class="modal fade" id="modalProve" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="table-responsive">




<table class="table table-hover" id="tableData">
 <thead class="" style="background: #1E3E8B;color: #fff">
    <tr>
		<th scope="col">#</th>
		<th scope="col">Nombre</th>
		<th scope="col">Ruc</th>
		<th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody id="tableb">  
		@foreach ($proveedor as $value)
		<tr>
		<td scope="row">{{$value->idproveedor}}</td>
		<td>{{$value->nombre}}</td>
		<td>{{$value->ruc}}</td>
		<td>
		
		<button class="btn btn-success"  idprove='{{$value->idproveedor}}' nombre='{{$value->nombre}}' id='btnAddProve'>
			<i class="fa fa-plus-circle" aria-hidden="true"></i>
		</button>

		

		</td>
	    </tr> 
		@endforeach

  </tbody>
</table>


</div>
				

			</div>
			
		</div>
	</div>
</div>


@endsection


@section('contenido-derecho')


@endsection




@section('scripts')
 <script type="text/javascript" src="js/compra.js"></script>
  <script type="text/javascript" src="js/compraadd.js"></script>
@endsection