<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

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
Route::get('usuarios/actualizar/{nombre_usuario}', [UsuariosController::class, 'CrearFormulario']);
Route::post('usuarios/actualizar/{nombre_usuario}', [UsuariosController::class, 'UpdateUsuarios']);
Route::post('/usuarios/crear', [UsuariosController::class, 'CrearUsuario']);
Route::get('/usuarios/borrar/{nombre_usuario}', [UsuariosController::class, 'BorrarUsuario']);
