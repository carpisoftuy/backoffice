<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\AlmacenesController;
use App\Http\Controllers\UbicacionController;

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

Route::prefix("v1")->group(function(){

    Route::get('/', [UsuariosController::class, 'MenuUsuarios']);
    Route::get('/usuarios/crear', function(){
        return view('formularioUsuarios');
    });

    Route::get('usuarios/actualizar/{id}', [UsuariosController::class, 'CrearFormulario']);
    Route::post('usuarios/actualizar/{id}', [UsuariosController::class, 'UpdateUsuarios']);
    Route::post('/usuarios/crear', [UsuariosController::class, 'CrearUsuario']);
    Route::get('/usuarios/borrar/{id}', [UsuariosController::class, 'BorrarUsuario']);
    Route::post('/paquete/asignar_camioneta', [PaqueteController::class, 'AsignarCamioneta']);
    Route::get('/paquete/finalizar_transito/{id}', [PaqueteController::class, 'FinalizarTransito']);
    Route::post('/chofer/asignar_camioneta', [UsuariosController::class, 'AsignarChoferACamioneta']);

    Route::get('/backoffice', function(){
        return view('backoffice');
});

});


    Route::get('/', [UsuariosController::class, 'MenuUsuarios']);
    Route::get('/usuarios/crear', function(){
        return view('formularioUsuarios');
    });

    Route::get('usuarios/actualizar/{id}', [UsuariosController::class, 'CrearFormulario']);
    Route::post('usuarios/actualizar/{id}', [UsuariosController::class, 'UpdateUsuarios']);
    Route::post('/usuarios/crear', [UsuariosController::class, 'CrearUsuario']);
    Route::get('/usuarios/borrar/{id}', [UsuariosController::class, 'BorrarUsuario']);

    Route::post('/paquete/asignar_camioneta', [PaqueteController::class, 'AsignarCamioneta']);
    Route::get('/paquete/finalizar_transito/{id}', [PaqueteController::class, 'FinalizarTransito']);

    Route::post('/chofer/asignar_camioneta', [UsuariosController::class, 'AsignarChoferACamioneta']);


    Route::get('/vehiculos', [VehiculoController::class, 'GetVehiculos']);
    Route::get('/vehiculos/{id}', [VehiculoController::class, 'GetVehiculo']);
    Route::post('/vehiculos', [VehiculoController::class, 'CreateVehiculo']);
    Route::put('/vehiculos/{id}', [VehiculoController::class, 'UpdateVehiculo']);
    Route::delete('/vehiculos/{id}', [VehiculoController::class, 'DeleteVehiculo'])->name('vehiculos.delete');

    Route::get('almacenes', [AlmacenesController::class, 'GetAlmacenes']);
    Route::get('almacenes/{id}', [AlmacenesController::class, 'GetAlmacen']);
    Route::post('almacenes', [AlmacenesController::class, 'CreateAlmacen']);
    Route::put('almacenes/{id}', [AlmacenesController::class, 'UpdateAlmacen']);
    Route::delete('almacenes/{id}', [AlmacenesController::class, 'DeleteAlmacen'])->name('almacenes.delete');

    Route::get('ubicaciones', [UbicacionController::class, 'GetUbicaciones']);
    Route::get('ubicaciones/{id}', [UbicacionController::class, 'GetUbicacion']);
    Route::post('ubicaciones/', [UbicacionController::class, 'CreateUbicacion']);
    Route::put('ubicaciones/{id}', [UbicacionController::class, 'UpdateUbicacion']);
    Route::delete('ubicaciones/{id}', [UbicacionController::class, 'DeleteUbicacion'])->name('ubicaciones.delete');


    Route::get('/backoffice/vehiculos', [VehiculoController::class, 'menuVehiculos']);

    Route::get('/backoffice/almacenes', [AlmacenesController::class, 'menuAlmacenes']);


