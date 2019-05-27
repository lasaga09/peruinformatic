
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

@section('contenido-header')

{{-- add --}}



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
				
				<div class="col-6">
					<label for="pgenegenericarica">P/Generica</label>
					<input type="number" class="form-control" id="generica" name="generica" aria-describedby="emailHelp" placeholder="Generica" required="">
					<small id="categoriaValidacion" class="form-text text-muted"></small>
				</div>
				<div class="col-6">
					<label for="original">P/Original</label>
					<input type="number" class="form-control" id="original" name="original" aria-describedby="emailHelp" placeholder="Original" required="">
					<small id="categoriaValidacion" class="form-text text-muted"></small>
				</div>
				
			</div>

         
		       


				<div class="row">
					
					<div class="col-6">
						<label for="compra">P/Compra</label>
						<input type="number" class="form-control" id="compra" name="compra" aria-describedby="emailHelp" placeholder="precio de compra" required="">
						<small id="categoriaValidacion" class="form-text text-muted"></small>
					</div>
					<div class="col-6">
						<label for="venta">P/Venta</label>
						<input type="number" class="form-control" id="venta" name="venta" aria-describedby="emailHelp" placeholder="Precio de venta" required="">
						<small id="categoriaValidacion" class="form-text text-muted"></small>
					</div>
					
				</div>




				<div class="row">
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
				
				<div class="col-8 ">

					<input type ="file" class="form-control-file" id="imagen" name="imagen">
					

				</div>


				<div class="col-4 ">
					<div class="loadimagen d-flex justify-content-center"  style="width: 100%;height: 100px;border-collapse: collapse;border-image: unset;-webkit-box-shadow: 2px 2px 2px 2px #17D8FF;
						box-shadow: 2px 2px 2px 2px #17D8FF;">
						<img src="" id="imgshow" width="150">
						
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
      <th scope="col">P/Generica</th>
      <th scope="col">P/Original</th>
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

			
			<button id  ="btnDetails" class="btn btn-info" tokenDet="{{ csrf_token() }} "  idcateDel="{{$value->idproducto}}"><i class="fa fa-eye" aria-hidden="true"></i></button>



		@if (session('idsede') !=6)
			@if ($value->stock == 0)
					 <button id  ="btnSugeriri" class="btn btn-success" tokenSugerir="{{ csrf_token() }} "  idcateDel="{{$value->idproducto}}"><i class="fa fa-bell" aria-hidden="true"></i></button>
			@endif
		@endif


    </td>
      
    </tr> 


     @endforeach 
   
  </tbody>
</table>
</div>








@endsection







@section('scripts')
 <script type="text/javascript" src="js/productos.js"></script>

@endsection