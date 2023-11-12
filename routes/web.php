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
Route::post('/usuarios/', [UsuariosController::class, 'CrearUsuario']);
Route::put('/usuarios/{id}', [UsuariosController::class, 'UpdateUsuarios']);
Route::delete('/usuarios/{id}', [UsuariosController::class, 'BorrarUsuario']);
Route::get('/usuarios/{id}/borrar', [UsuariosController::class, 'BorrarUsuario']);

Route::post('/paquete/asignar_camioneta', [PaqueteController::class, 'AsignarCamioneta']);
Route::get('/paquete/finalizar_transito/{id}', [PaqueteController::class, 'FinalizarTransito']);
Route::post('/chofer/asignar_camioneta', [UsuariosController::class, 'AsignarChoferACamioneta']);

Route::post('/paquete/asignar_camioneta', [PaqueteController::class, 'AsignarCamioneta']);
Route::get('/paquete/finalizar_transito/{id}', [PaqueteController::class, 'FinalizarTransito']);

Route::get('/paquetes', [PaqueteController::class, 'GetPaquetes']);
Route::get('/paquetes/{id}', [PaqueteController::class, 'GetPaquete']);
Route::post('/paquetes', [PaqueteController::class, 'CreatePaquete']);
Route::put('/paquetes/{id}', [PaqueteController::class, 'UpdatePaquete']);
Route::delete('/paquetes/{id}', [PaqueteController::class, 'DeletePaquete'])->name('paquetes.delete');

Route::post('/choferes/asignar_vehiculo', [UsuariosController::class, 'AsignarChoferAVehiculo']);
Route::delete('/choferes/desasignar_vehiculo/{id}', [UsuariosController::class, 'DesasignarChoferAVehiculo']);

Route::get('/vehiculos', [VehiculoController::class, 'GetVehiculos']);
Route::get('/vehiculos/{id}', [VehiculoController::class, 'GetVehiculo']);
Route::post('/vehiculos', [VehiculoController::class, 'CreateVehiculo']);
Route::put('/vehiculos/{id}', [VehiculoController::class, 'UpdateVehiculo']);
Route::delete('/vehiculos/{id}', [VehiculoController::class, 'DeleteVehiculo'])->name('vehiculos.delete');

Route::get('/almacenes', [AlmacenesController::class, 'GetAlmacenes']);
Route::get('/almacenes/{id}', [AlmacenesController::class, 'GetAlmacen']);
Route::post('/almacenes', [AlmacenesController::class, 'CreateAlmacen']);
Route::put('/almacenes/{id}', [AlmacenesController::class, 'UpdateAlmacen']);
Route::delete('/almacenes/{id}', [AlmacenesController::class, 'DeleteAlmacen'])->name('almacenes.delete');

Route::get('/ubicaciones', [UbicacionController::class, 'GetUbicaciones']);
Route::get('/ubicaciones/{id}', [UbicacionController::class, 'GetUbicacion']);
Route::post('/ubicaciones/', [UbicacionController::class, 'CreateUbicacion']);
Route::put('/ubicaciones/{id}', [UbicacionController::class, 'UpdateUbicacion']);
Route::delete('/ubicaciones/{id}', [UbicacionController::class, 'DeleteUbicacion'])->name('ubicaciones.delete');

Route::redirect('/', '/backoffice');
Route::prefix('/backoffice')->group(function (){
    Route::get('/', [UsuariosController::class, 'MenuUsuarios']);
    Route::get('/usuarios/crear', function(){
        return view('formularioUsuarios');
    });
    Route::get('/usuarios/modificar/{id}', [UsuariosController::class, 'CrearFormulario']);

    Route::get('/vehiculos', [VehiculoController::class, 'menuVehiculos']);
    Route::get('/vehiculos/{id}', [VehiculoController::class, 'menuVehiculo']);

    Route::get('/almacenes', [AlmacenesController::class, 'menuAlmacenes']);
    Route::get('/almacenes/{id}', [AlmacenesController::class, 'modificarAlmacen']);

    Route::get('/ubicaciones/{id}', [VehiculoController::class, 'modificarUbicacion']);

    Route::get('/paquetes', [PaqueteController::class, 'menuPaquetes']);
    Route::get('/paquetes/{id}', [PaqueteController::class, 'menuPaquete']);
});


