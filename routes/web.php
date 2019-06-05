<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*principal*/
 Route::get('/', function () {
    return redirect()->route('Login.index');
}); 


Route::resource('Login','Login\LoginController');
Route::resource('Usuario','Usuario\UsuarioContoller');
Route::resource('Cliente','ClienteController');
Route::resource('Home','PrincipalController');
Route::resource('Categoria','CategoriaController');
Route::resource('Proveedor','ProveedorController');
Route::resource('Rol','RolController');
Route::resource('Producto','ProductoController');
Route::resource('Compra','CompraController');
Route::resource('CompraDetalle','CompraDetalleController');
Route::resource('Reparacion','ReparacionController');

/*para actualizar con imagen*/
Route::post('ProductoUp/{id}','ImagenController@up')->name('Producto.up');

/*obtner el id el ultimo registro de compras*/
/*Route::post('Ultimoid','ImagenController@ultimoid')->name('Ultimoid.ultimoid');*/


/*para uso opcionales*/
Route::get('Items','OtroController@items')->name('Items.items');
Route::get('Tecnico/{id}','OtroController@Telefono')->name('Tecnico.telefono');
Route::get('Marca/{id}','OtroController@Marca')->name('Tecnico.marca');


Route::put('Permiso/{id}','PermisoController@update')->name('Permiso.update');
Route::get('Permiso/{id}','PermisoController@show')->name('Permiso.show');

/*ountsing*/
Route::get('Out','auotController@Ount')->name('singout');