
@extends('Plantilla3.index')
@section('subItem','Home')
@section('subItem2','Principal')




@section('nombre')
	{{session('usuario')}}
@endsection

@section('rol')
	{{session('rol')}}
@endsection
@section('sede')

	{{session('sede')}}
@endsection


@section('contenido-cabezera')
 @if (session('idrol') == 1 or session('idrol') == 2 )
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$tusuario}}</h3>
                <p>Usuarios registrado</p>
              </div>
              <div class="icon">
                <i class="fa fa-users" aria-hidden="true"></i>
              </div>
              <a href="Usuario" class="small-box-footer">Ir a Usuarios <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endif
      


      {{-- permisos cliente --}}
          @if (session('permisos')->pcliente == 0)
            <div class="col-lg-3 col-6">
              <div class="small-box bg-success" id="Vcli">
                <div class="inner">
                  <h3>{{$tcliente}}</h3>
                  <p>Clientes registrados</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <a href="Cliente"  class="small-box-footer" style="pointer-events:none;
                cursor: pointer;">ir a clientes <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          @else
            <div class="col-lg-3 col-6" style="display:;">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$tcliente}}</h3>
                  <p>Clientes registrados</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <a href="Cliente" class="small-box-footer">ir a clientes <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>


          @endif




{{-- validar proveedores --}}

 @if (session('permisos')->pproveedores == 0)
        
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$tproveedor}}</h3>
              <p>Proveedores Registrado</p>
            </div>
            <div class="icon">
              <i class="fa fa-car" aria-hidden="true"></i>
            </div>
            <a href="Proveedor" style="pointer-events:none;
            cursor: pointer;" class="small-box-footer">ir a proveedores <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    @else

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$tproveedor}}</h3>
                <p>Proveedores Registrado</p>
              </div>
              <div class="icon">
                <i class="fa fa-car" aria-hidden="true"></i>
              </div>
              <a href="Proveedor" class="small-box-footer">ir a proveedores <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

    @endif







{{-- validar productos --}}
@if (session('permisos')->pproductos == 0)
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger"  id="Vpro">
              <div class="inner">
                <h3 style="color:#DC3545">65</h3>
                <p>Productos</p>
              </div>
              <div class="icon">
                <i class="fa fa-product-hunt" aria-hidden="true"></i>
              </div>
              <a href="Producto" style="pointer-events:none;
              cursor: pointer;" class="small-box-footer">ir a productos <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
      @else
            <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3 style="color:#DC3545">65</h3>
                  <p>Productos</p>
                </div>
                <div class="icon">
                  <i class="fa fa-product-hunt" aria-hidden="true"></i>
                </div>
                <a href="Producto" class="small-box-footer">ir a productos <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

  @endif





{{-- validar ventas --}}

@if (session('permisos')->pventa == 0)

            <div class="col-lg-3 col-6">
              <div class="small-box bg-info" id="Vven">
                <div class="inner">
                  <h3>150</h3>
                  <p>Ventas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="Venta" style="pointer-events:none;
                cursor: pointer;" class="small-box-footer">ir a ventas <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

    @else
              <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>150</h3>
                    <p>Ventas</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="Venta" class="small-box-footer">ir a ventas <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>


  @endif





{{-- validar consultas --}}
@if (session('permisos')->pconsultas == 0)
       
                <div class="col-lg-3 col-6">
                  <div class="small-box bg-success" id="Vcon">
                    <div class="inner">
                      <h3>53<sup style="font-size: 20px">%</sup></h3>
                      <p>Consultas</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" style="pointer-events:none;
                    cursor: pointer;" class="small-box-footer">ir a consultas <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
        @else

                <div class="col-lg-3 col-6">
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>53<sup style="font-size: 20px">%</sup></h3>
                      <p>Consultas</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">ir a consultas <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
   
      @endif





         
    

    {{-- validar compras --}}     

    @if (session('permisos')->pcompra == 0)
                <div class="col-lg-3 col-6">
                  <div class="small-box bg-warning" id="Vconpra">
                    <div class="inner">
                      <h3>65</h3>
                      <p>Compras</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </div>
                    <a href="Compra" style="pointer-events:none;
                    cursor: pointer;" class="small-box-footer">ir compras <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
      @else
                  <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>65</h3>
                        <p>Compras</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                      </div>
                      <a href="Compra" class="small-box-footer">ir compras <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>


    @endif




{{-- validar reporte --}}
@if (session('permisos')->preporte == 0)
            <div class="col-lg-3 col-6">
              <div class="small-box bg-info" id="Vrepo">
                <div class="inner">
                  <h3>150</h3>
                  <p>Reportes</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" style="pointer-events:none;
                cursor: pointer;" class="small-box-footer">ir reportes <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

    @else

          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>
                <p>Reportes</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">ir reportes <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

    @endif
  

      
           

       {{--   {{session('permisos')}} --}}
       
         
@endsection

@section('contenido')
	
<h5>pantallas principal</h5>




@endsection

@section('scripts')
<script src="js/validarhome.js"></script>

@endsection