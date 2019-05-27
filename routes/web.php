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


Route::put('Permiso/{id}','PermisoController@update')->name('Permiso.update');
Route::get('Permiso/{id}','PermisoController@show')->name('Permiso.show');

/*ountsing*/
Route::get('Out','auotController@Ount')->name('singout');