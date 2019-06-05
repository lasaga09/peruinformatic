
@extends('Plantilla3.index')
@section('subItem','Reparaciones')

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
	

	<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus-circle" aria-hidden="true"></i>
  Nuevo
</button>
<br>


<!-- Modal add -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				
				<button type="button" class="close" id="cerraradd" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="Reparacion" method="POST">
				<div class="modal-body">
					@csrf
					
					<input type="text" name="" id="token" hidden="" value="{{ csrf_token() }}">

			
					<input type="text" name="usuario" value="{{session('idusuario')}}">
					<input type="text" name="sede" id="sede" value="{{session('idsede')}}">
					

					<div class="row">
							<div class="col-6 lead">
							<h4 class="lead">Hoja de servicio tecnico
							</h4>
							
							</div>
							<div class="col-6">
							<span>Nro:</span>
							</div>
						
					</div>
					<div class="row" style="border:1px #222 solid;padding: 10px">{{-- div reparacion --}}
						
							
							<div class="col-8">
								<span>Cliente</span>

								<select class="form-control" id="cliente" name="cliente">
								@foreach ($clientes as $e)
								
								<option value="{{$e->idcliente}}">{{$e->nombre}} - {{$e->apellido}}</option>
								
								@endforeach
								</select>
							
							
							</div>
							

							<div class="col-4">
								<span>Celular</span>
								<input type="text" name="celular" id="celular" class="form-control" readonly="">
							</div>



					</div>


					<div class="container mt-3" style="border:1px #222 solid;padding: 10px">{{-- detalles --}}

					<div class="col-12">Descripcion del Equipo</div>
						<div class="row">
						
						<div class="col-6 mt-3">
						<span>Equipo</span>
						<select id="equipo" class="form-control">
						<option value="Celular">Celular</option>
						<option value="Tablet">Tablet</option>
						<option value="Pc">Pc</option>
						<option value="Lapton">Lapton</option>
						<option value="Impresora">Impresora</option>
						<option value="Otro">Otro</option>
						</select>
						
						</div>
						<div class="col-6 mt-3">
						<span>Marca</span>
						<select  id="marca" class="form-control">
						@foreach ($marcas as $r)
						
						<option value="{{$r->idmarcas}}">{{$r->nombre}}</option>
						@endforeach
						</select>
						
						</div>
						<input type="text" name="" id="vermarca" hidden="">
						</div>


					<div class="row mt-3">
						<div class="col">
							<input type="text"  id="descripcion" class="form-control" placeholder="descripcion de piezas de reparacion"> 
						</div>
						
						
					</div>
					<div class="row mt-3">
						<div class="col-4">
							<input type="text"  id="modelo" class="form-control" placeholder="modelo"> 
						</div>
						<div class="col-4">
							<input type="text"  id="precio" class="form-control" placeholder="precio"> 
						</div>
						<div class="col-4">
							<input type="text"  id="cantidad" class="form-control" placeholder="cantidad"> 
						</div>
						
					</div>

					
                       <hr>
						<div class="row mt-3">
							<div class="col-12 mb-3" style="border:1px #6E6B6B solid"><span>EQUIPO RECEPCIONADO POR POSIBLES FALLAS</span></div>
							<div class="col-6"><div><input type="checkbox" name="uno" value="Equipo apagado" >Equipo apagado</div></div>
							
							<div class="col-6"><div><input type="checkbox" name="uno" value="Pantalla dañada">Pantalla dañada</div></div>

							<div class="col-6"><div><input type="checkbox" name="uno" value="Placa dañada" >Placa dañada</div></div>
							<div class="col-6"><div><input type="checkbox" name="uno" value="Tactil dañado" >Tactil dañado</div></div>
							<div class="col-6"><div><input type="checkbox" name="uno" value="Equipo por agua" >Equipo por agua</div></div>
							<div class="col-6"><div><input type="checkbox" name="uno" value="Garantia de equipo" >Garantia de equipo</div></div>
							
							
							<div class="col-12"><div><input type="checkbox" name="uno" value="Desbloqueo,liberacion,flasheo,cuenta,patron" >Desbloqueo,liberacion,flasheo,cuenta,patron</div></div>

							<div class="col-12"><div><input type="checkbox" name="uno" value="Cambio de Zocalo,audio,altavoz,parlante,bateria" >Cambio de Zocalo,audio,altavoz,parlante,bateria</div></div>
							<div class="col-6"><div><input type="checkbox" name="uno" value="Otro" id="Otro">Otro</div></div>
							<div class="col-12" style="display: none;" id="divotro"><div><input type="text" id="otrafallainput"  class="form-control" placeholder="otra falla"></div></div>
							
						
							
							
						
						</div><hr>
						<div class="row">
						<button type ="button" class="btn btn-success" id="btnaddItem"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
						</div>
						<hr>
						   <div class="row">

						<table class="table table-hover table-responsive">
						<thead style="border-radius: 10px">
						<tr  style="background: #1B377C;color:#fff;">
						<th scope="col" width="5%">Accion</th>
						<th scope="col">Equipo</th>
						<th scope="col">descripcion</th>
						<th scope="col">Falla</th>
						<th scope="col">Cantidad</th>
				    	<th scope="col">Precio</th>
						<th scope="col">Subtotal</th>
						
						</tr>
						</thead>
					
						<tbody id="detalles">



				
						</tbody>
						
						</table>

					</div>
						
						

						
						
						


				    </div>


					
				<br>

			
				<div class="row">
					<div class="col-4"><input type="text" name="cuenta" id="cuenta" class="form-control" placeholder="a cuenta"></div>
					<div class="col-4"><input type="text" name="saldo" disabled="" placeholder="saldo" id="saldo" class="form-control"></div>
					<div class="col-4 text-center "><span id="total" class="form-control bg-warnnig">Total a pagar: S/. 0.0 </span></div>
					<input type="text" name="total" id="total_total" class="form-control" hidden="">
				</div>
				<br>
					
				
				<div class="row">
						<button type ="submit" class="btn btn-success" id="btnAdd"><i class="fa fa-floppy-o" aria-hidden="true"> Guardar</i></button>
				</div>
					
				</div>
				
			</form>
			
		</div>
	</div>
</div>






<br>
{{-- modelo tabla --}}
<table class="table table-hover" id="tableData">
 <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cliente</th>
      <th scope="col">Celular</th>
      <th scope="col">F/Recepcion</th>
      <th scope="col">F/Finalizado</th>
      <th scope="col">Estado</th>
    
      <th scope="col">Total</th>
       <th scope="col">Sede</th>
       @if (session('idsede')==6)
       	<th scope="col">Usuario</th>
      <th scope="col">Acciones</th>
       @endif
    </tr>
  </thead>
  <tbody id="tableb">  
  @foreach ($datos as $value)
   <tr>
	<td scope="row">{{$value->numero}}</td>
	<td>{{$value->cliente}}</td>
	<td>{{$value->celular}}</td>
	<td>{{$value->fecha_recepcion}}</td>
	<td>{{$value->fecha_finalizado}}</td>
	@if ($value->estado == 0)
		<td ><i style="background: #FFD646;padding: 5px;border-radius: 5px">en curso</i></td>
		@else
		<td ><i style="background: #46C767;padding: 5px;border-radius: 5px">Finalizado</i></td>	
	@endif

	<td>S/. {{$value->total}}</td>
	@if (session('idsede')==6)
		<td>{{$value->sede}}</td>
		<td>{{$value->usuario}}</td>
	@endif
	<td>
       
       <button data-toggle ="modal" class="btn btn-warning"  data-target="#edit" id="btnEdit" idcate='{{$value->idreparacion}}'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
       <button id          ="btnDelete" class="btn btn-danger" tokende="{{ csrf_token() }} "  idcateDel="{{$value->idreparacion}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
    </td>
      </td>
    </tr> 
     @endforeach 
  </tbody>
</table>

@endsection

@section('contenido')
	

@endsection


@section('contenido-derecho')


@endsection




@section('scripts')

<script type="text/javascript" src="js/reparacion.js"></script>
 
@endsection