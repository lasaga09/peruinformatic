
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
	
<h5>index cliente</h5>




@endsection
