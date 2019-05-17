
@extends('Plantilla3.index')
@section('subItem','Home')




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
	
<h5>pantallas principal</h5>




@endsection
