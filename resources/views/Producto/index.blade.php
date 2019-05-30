
@extends('Plantilla3.index')
@section('subItem','Productos')

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
<link rel="stylesheet" type="text/css" href="css/producto.css">
<link rel="stylesheet" type="text/css" href="css/producto_animacioncargaSugerencias.css">

@endsection

@section('contenido-header')

<div style="width:100px;display: none" id="cargaSimulada" >
	<div class="loading-wrap">
  <div class="triangle1"></div>
  <div class="triangle2"></div>
  <div class="triangle3"></div>
</div>
</div>


{{-- sugerencia --}}
<div class="alert  alert-dismissible fade show" role="alert" style="display: none;background: #009975;color:#fff" id="msu">
  <strong>Sugerencias!</strong> <hr>

	<div id="datosSugerencia" class="row d-flex justify-content-around">

	
		   

		
	</div>

  <button type="button" class="close" id="btnclosesu" style="color:#fff">
    <span aria-hidden="true" style="color:#fff;">X</span>
  </button>
</div>




{{-- add --}}

<div class="loader-page"></div>
 

<!-- Button trigger modal -->
@if (session('idsede') != 6)
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus-circle" aria-hidden="true"></i>
  Nuevo
</button>


@endif
<br><br>




{{-- modal detalles --}}


<!-- Modal -->
<div class="modal fade" id="modalDeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title d-flex justify-content-center" id="exampleModalCenterTitle">Detalles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				
				<div width="100%">
				
				<div class="card mb-3" style="max-width: 100%;height: auto">
				<div class="row no-gutters">
				<div class="col-md-6">
				<img src="" class="card-img" alt="" id="imgdeta" height="400px">
				</div>
				
				
				<div class="col-md-6">
				
		
		
		<div class="card" style="width: 100%;">
		<div class="card-header text-center" id="nombredeta">
		
		</div>
		
		<li class="list-group-item"><b>Marca: </b> <span id="marcadeta"></span></li>
		<li class="list-group-item"><b>Modelo: </b> <span id="modelodeta"></span></li>
	<li class="list-group-item"><b>Color: </b> <span id="colordeta"></span></li>
	<li class="list-group-item"><b>Categoria: </b> <span id="categoriadeta"></span></li>
	   <li class="list-group-item">
	   	<b>Generica: </b> <span id="genericadeta"></span> 
	   	
	   	<b style="margin-left: 10%">Alternativo: </b> <span id="alternativodeta"></span>
	   	<b style="margin-left: 10%">Original: </b> <span id="originaldeta"></span>

	   </li>
		
		<li class="list-group-item" >
			<b>P/Punto: </b> <span id="compradeta" style="border: 1px #D3D1D1 solid;background: #FB4848;color:#fff"></span> 
			<b style="margin-left: 2%">P/Desct: </b><span id="descuentodeta" style="border: 1px #D3D1D1 solid;background: #FAAB44;color: #fff"></span>
			<b style="margin-left: 2%">P/Venta: </b> <span id="ventadeta" style="border: 1px #D3D1D1 solid;background: #67C46E;color: #fff"></span>
		</li>
		
		<li class="list-group-item"><b>Stock: </b> 


            <span id="stockdeta"></span></li>
		</div>

			
				
				
				</div>
				
				</div>
				</div>
				</div>

				@if (session('idsede')==6)
					<div class="row text-centerv d-flex justify-content-center">
					<span id="sededetat"></span>
				</div>
				@else
				<span id="sededetat" hidden=""></span>
				@endif
        
      </div>
     
    </div>
  </div>
</div>








<!-- Modal agregar -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalCenterTitle"></h5>
        <button type="button" class="close" id="cerraradd" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

       <form id="formAd" enctype="multipart/form-data">
            <div class="modal-body">

            <input type="text" name="" id="token" hidden="" value="{{ csrf_token() }}">
            <div class="form-group">
            <label for="producto">Nombre del Producto</label>
            <input type="text" class="form-control" id="producto" name="producto" aria-describedby="emailHelp" placeholder="producto" required="">
            <small id="categoriaValidacion" class="form-text text-muted"></small>
            </div>
         

			<div class="row">
				
				
				<div class="col-6">
					<div class="form-group">
						<label for="marca">Seleccione Marca</label><br>
						<select name="marca" id="marca" style="width: 100%">
							@foreach ($marca as $t)
							<option value="{{$t->idmarcas}}">{{$t->nombre}}</option>
							@endforeach
							
						</select>
					</div>
				</div>
				
				<div class="col-6">
					<div class="form-group">
						<label for="color">Seleccione Color</label><br>
						<select name="color" id="color" style="width: 100%">
							@foreach ($color as $t)
							<option value="{{$t->idcolores}}">{{$t->nombre}}</option>
							@endforeach
							
						</select>
						
					</div>
				</div>
			</div>


			<div class="form-group">
			<label for="modelo">Modelo</label>
			<input type="text" class="form-control" id="modelo" name="modelo" aria-describedby="emailHelp" placeholder="modelo" required="">
			<small id="categoriaValidacion" class="form-text text-muted"></small>
			</div>

			<div class="row">
				
				<div class="col-4">
					<label for="pgenegenericarica">Generica</label>
					<input type="number" class="form-control" id="generica" name="generica" aria-describedby="emailHelp" placeholder="Generica" required="">
					<small id="categoriaValidacion" class="form-text text-muted"></small>
				</div>
				<div class="col-4">
					<label for="original">Original</label>
					<input type="number" class="form-control" id="original" name="original" aria-describedby="emailHelp" placeholder="Original" required="">
					<small id="categoriaValidacion" class="form-text text-muted"></small>
				</div>

				<div class="col-4">
					<label for="alternativo">Alternativo</label>
					<input type="number" class="form-control" id="alternativo" name="alternativo" aria-describedby="emailHelp" placeholder="alternativo" required="">
					<small id="categoriaValidacion" class="form-text text-muted"></small>
				</div>
				
			</div>

         
		       


				<div class="row mt-3">
					
					<div class="col-4">
						<label for="compra">P/Punto</label>
						<input type="number" class="form-control" id="compra" name="compra" aria-describedby="emailHelp" placeholder="precio de compra" required="">
						<small id="categoriaValidacion" class="form-text text-muted"></small>
					</div>

					<div class="col-4">
						<label for="descuento">P/Descuento</label>
						<input type="number" class="form-control" id="descuento" name="descuento" aria-describedby="emailHelp" placeholder="Precio con descuento" required="">
						<small id="categoriaValidacion" class="form-text text-muted"></small>
					</div>

					<div class="col-4">
						<label for="venta">P/Venta</label>
						<input type="number" class="form-control" id="venta" name="venta" aria-describedby="emailHelp" placeholder="Precio de venta" required="">
						<small id="categoriaValidacion" class="form-text text-muted"></small>
					</div>

					
					
				</div>




				<div class="row mt-3">
					<div class="col-6">
						
						<label for="stock">Stock</label>
						<input type="number" class="form-control" id="stock" name="stock" aria-describedby="emailHelp" placeholder="stock del producto" required="">
					
					</div>

					<div class="col-6">
						
							<label for="categoria">Seleccione Categoria</label><br>
							<select name="categoria" id="categoria" style="width: 100%;height: 35px">
								@foreach ($categoria as $t)
								<option value="{{$t->idcategoria}}">{{$t->nombre}}</option>
								@endforeach
								
							</select>
							
					
					</div>


				</div>
				

<input type="text" name="idsede" id="idsede" hidden="" value="{{session('idsede')}}">
<br>
			<div class="row align-items-center justify-content-center ">
				
				<div class="col-6 ">
					<label for="imagen" class="btn btn-info"><i class="fa fa-arrow-up" aria-hidden="true"> <span>Cargar Imagen</span></i></label>

					<input hidden="" type ="file" class="form-control-file" id="imagen" name="imagen">
					

				</div>


				<div class="col-6 ">
					<div class="loadimagen d-flex justify-content-center"  style="width: 80%;height: 180px;border-collapse: collapse;-webkit-box-shadow:inset 0 0 0 2px #539636;
                         box-shadow:inset 0 0 0 2px #539636;">
						<img src="" id="imgshow" width="180">
						
					</div>
				</div>
			</div>
				




            
            <button type ="button" class="btn btn-success" id="btnAdd"><i class="fa fa-floppy-o" aria-hidden="true"> Guardar</i></button>
            
            </div>
     
      </form>

    

    </div>
  </div>
</div>















{{-- modelo tabla --}}

<div class="table-responsive">
<table class="table table-hover" id="tableData">
 <thead class="thead-dark">
    <tr>
     
      <th scope="col">Nombre</th>
      <th scope="col">Marca</th>
      <th scope="col">Modelo</th>
      <th scope="col">Color</th>
      <th scope="col">Generico</th>
      <th scope="col">Original</th>
      <th scope="col">P/Venta</th>
		<th scope="col">Stock</th>
		@if (session('idsede') == 6)
		<th scope="col">Sede</th>
		@endif
		
         


      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody id="tableb">  
  @foreach ($datos as $value)
   <tr>
      
      <td>{{$value->producto}}</td>
      <td>{{$value->marca}}</td>
      <td>{{$value->modelo}}</td>
      <td>{{$value->color}}</td>
      <td>{{$value->pantalla_generica}}</td>
      <td>{{$value->pantalla_original}}</td>
      <td>{{$value->precio_venta}}</td>
       @if ($value->stock > 0 && $value->stock <= 5)
       	<td style="color: orange;font-size: 20px;font-weight: 500">{{$value->stock}}</td>
       	@elseif($value->stock > 5)
       		<td style="color: green;font-size: 20px;font-weight: 500">{{$value->stock}}</td>
       	@else
       	 	<td style="color: red;font-size: 20px;font-weight: 500">{{$value->stock}}</td>
        @endif
        

       	@if (session('idsede') == 6)
		<td>{{$value->sede}}</td>
		@endif
		
       
      <td>


       
     @if (session('idsede') !=6)
     	  <button data-toggle ="modal" class="btn btn-warning"  data-target="#edit" id="btnEdit" idcate='{{$value->idproducto}}'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
       
       <button id          ="btnDelete" class="btn btn-danger" tokende="{{ csrf_token() }} "  idcateDel="{{$value->idproducto}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
     @endif

			
			<button id  ="btnDetails" class="btn btn-info" data-toggle="modal" data-target="#modalDeta" tokenDet="{{ csrf_token() }} "  idcateDetalle="{{$value->idproducto}}"><i class="fa fa-eye" aria-hidden="true"></i></button>



		@if (session('idsede') !=6)
			@if ($value->stock == 0)
					 <button id="btnSugerir" class="btn btn-success" tokenSugerir="{{ csrf_token() }} "  idproductosugerencia="{{$value->idproducto}}"><i class="fa fa-bell" aria-hidden="true"></i></button>
			@endif
		@endif


    </td>
      
    </tr> 


     @endforeach 
   
  </tbody>
</table>
</div>








<!-- Modal edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalCenterTitle">edit</h5>
        <button type="button" class="close" id="cerrarup" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
         <form  enctype="multipart/form-data" id="formularioUp" >
         	<div class="modal-body">
         	
         
         	<input type="text" name="" id="tokenup" hidden="" value="{{ csrf_token() }}">
            <div class="form-group">
            <label for="productoup">Nombre del Producto</label>
            <input type="text" class="form-control" id="productoup" name="productoup" aria-describedby="emailHelp" placeholder="producto" required="">
            <small id="categoriaValidacion" class="form-text text-muted"></small>
            </div>

            <div class="form-group">
			<label for="modeloup">Modelo</label>
			<input type="text" class="form-control" id="modeloup" name="modeloup" aria-describedby="emailHelp" placeholder="modelo" required="">
			<small id="categoriaValidacion" class="form-text text-muted"></small>
			</div>




			<div class="row">
				
				
				<div class="col-6">
					<div class="form-group">
						<label for="marcaup">Seleccione Marca</label><br>
						<select name="marcaup" id="marcaup" style="width: 100%">
							@foreach ($marca as $t)
							<option value="{{$t->idmarcas}}">{{$t->nombre}}</option>
							@endforeach
							
						</select>
					</div>
				</div>
				
				<div class="col-6">
					<div class="form-group">
						<label for="colorup">Seleccione Color</label><br>
						<select name="colorup" id="colorup" style="width: 100%">
							@foreach ($color as $t)
							<option value="{{$t->idcolores}}">{{$t->nombre}}</option>
							@endforeach
							
						</select>
						
					</div>
				</div>
			</div>
				

			<div class="row mt-3">
				
				<div class="col-4">
					<label for="genericaricaup">Generica</label>
					<input type="number" class="form-control" id="genericaup" name="genericaup" aria-describedby="emailHelp" placeholder="" required="">
					<small id="categoriaValidacion" class="form-text text-muted"></small>
				</div>
				<div class="col-4">
					<label for="originalup">Original</label>
					<input type="number" class="form-control" id="originalup" name="originalup" aria-describedby="emailHelp" placeholder="" required="">
					<small id="categoriaValidacion" class="form-text text-muted"></small>
				</div>
				<div class="col-4">
					<label for="alternativoup">Alternativo</label>
					<input type="number" class="form-control" id="alternativoup" name="alternativoup" aria-describedby="emailHelp" placeholder="" required="">
					<small id="categoriaValidacion" class="form-text text-muted"></small>
				</div>
				
			</div>



				<div class="row mt-3">
					
					<div class="col-4">
						<label for="compraup">P/Compra</label>
						<input type="number" class="form-control" id="compraup" name="compraup" aria-describedby="emailHelp" placeholder="precio de compra" required="">
						<small id="categoriaValidacion" class="form-text text-muted"></small>
					</div>
					<div class="col-4">
						<label for="descuentoup">P/Descuento</label>
						<input type="number" class="form-control" id="descuentoup" name="descuentoup" aria-describedby="emailHelp" placeholder="" required="">
						<small id="categoriaValidacion" class="form-text text-muted"></small>
					</div>
					<div class="col-4">
						<label for="ventaup">P/Venta</label>
						<input type="number" class="form-control" id="ventaup" name="ventaup" aria-describedby="emailHelp" placeholder="Precio de venta" required="">
						<small id="categoriaValidacion" class="form-text text-muted"></small>
					</div>
					
				</div>
				

			<div class="row">
				<div class="col-6">
					
					<label for="stockup">Stock</label>
					<input type="number" class="form-control" id="stockup" name="stockup" aria-describedby="emailHelp" placeholder="stock del producto" required="">
					
				</div>
				<div class="col-6">
					
					<label for="categoriaup">Seleccione Categoria</label><br>
					<select name="categoriaup" id="categoriaup" style="width: 100%;height: 35px">
						@foreach ($categoria as $t)
						<option value="{{$t->idcategoria}}">{{$t->nombre}}</option>
						@endforeach
						
					</select>
					
					
				</div>
			</div>


			<input type="text" name="idsedeup" id="idsedeup" hidden="" value="{{session('idsede')}}" >
			<input type="text" name="idproducto" id="idproducto" hidden="" >


			<div class="row align-items-center justify-content-center ">
				
				<div class="col-6 ">
					<label for="imagenup" class="btn btn-info"><i class="fa fa-arrow-up" aria-hidden="true"> <span>Cargar Imagen</span></i></label>

					<input hidden="" type ="file" class="form-control-file" id="imagenup" name="imagenup">
					

				</div>


				<div class="col-6 ">
					<div class="loadimagen d-flex justify-content-center"  style="width: 80%;height: 180px;border-collapse: collapse;-webkit-box-shadow:inset 0 0 0 2px #539636;
                         box-shadow:inset 0 0 0 2px #539636;">
						<img src="" id="imgshowup" width="180">
						
					</div>
				</div>
			</div>
				








            <button type ="button" class="btn btn-success" id="btnUpdate"><i class="fa fa-floppy-o" aria-hidden="true"> Actualizar</i></button>
            
          </div>
         </form>
         </div>
    </div>
  </div>
















@endsection







@section('scripts')
 <script type="text/javascript" src="js/productos.js"></script>
  <script type="text/javascript" src="js/sugerencia.js"></script>

@endsection