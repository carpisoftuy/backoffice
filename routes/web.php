<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PaqueteController;

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