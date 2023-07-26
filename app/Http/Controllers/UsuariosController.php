<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Admin;
use App\Models\Chofer;
use App\Models\Almacenero;

class UsuariosController extends Controller
{
    public function MenuUsuarios(Request $request){
        $usuarios = Usuario::all();
        foreach($usuarios as $usuario){
            $usuario->isAdmin = $usuario->admin()->exists();
            $usuario->isAlmacenero = $usuario->almacenero()->exists();
            $usuario->isChofer = $usuario->chofer()->exists();
        }
        return view('gestionUsuarios', ['usuarios' => $usuarios]);
    }
    public function CrearUsuario(Request $request){
        $usuario = new Usuario();
        $usuario->nombre_usuario = $request->post('nombreUsuario');
        $usuario->contrasena = password_hash($request->post('contrasena'), PASSWORD_DEFAULT);
        $usuario->nombre = $request->post('nombre');
        $usuario->apellido = $request->post('apellido');
        $usuario->email = $request->post('email');
        $usuario->idioma_favorito = $request->post('idiomaFavorito');
        $usuario->codigo_postal = $request->post('codigoPostal');
        $usuario->calle = $request->post('calle');
        $usuario->nro_puerta = $request->post('nroPuerta');
        $usuario->observaciones_direccion = $request->post('observacionesDireccion');
        $usuario->latitud = $request->post('latitud');
        $usuario->longitud = $request->post('longitud');
        $usuario->save();
        if($request->post('admin')){
            $admin = new Admin();
            $admin->nombre_usuario = $usuario->nombre_usuario;
            $admin->save();
        }
        if($request->post('chofer')){
            $chofer = new Chofer();
            $chofer->nombre_usuario = $usuario->nombre_usuario;
            $chofer->save();
        }
        if($request->post('almacenero')){
            $almacenero = new Almacenero();
            $almacenero->nombre_usuario = $usuario->nombre_usuario;
            $almacenero->save();
        }
        return redirect('/');
    }
    public function BorrarUsuario(Request $request){
        $usuario = Usuario::find($request->nombre_usuario);
        
        if($usuario->almacenero()->exists()){
            $almacenero = Almacenero::find($request->nombre_usuario);
            $almacenero->delete();
        }
        
        if($usuario->admin()->exists()){
        $admin = Admin::find($request->nombre_usuario);
        $admin->delete();
        }

        if($usuario->chofer()->exists()){
        $chofer = Chofer::find($request->nombre_usuario);
        $chofer->delete();
        }
        
        $usuario->delete();

        return redirect('/');
    }
    public function CrearFormulario(Request $request){
        $usuario = Usuario::find($request->nombre_usuario);
        $usuario->isAdmin = $usuario->admin()->exists();
        $usuario->isAlmacenero = $usuario->almacenero()->exists();
        $usuario->isChofer = $usuario->chofer()->exists();
        return view('formularioUsuarios', ["usuario" => $usuario]);
    }
    public function UpdateUsuarios(Request $request){
        $usuario = Usuario::find($request->nombre_usuario);
        $usuario->nombre_usuario = $request->post('nombreUsuario');
        $usuario->contrasena = password_hash($request->post('contrasena'), PASSWORD_DEFAULT);
        $usuario->nombre = $request->post('nombre');
        $usuario->apellido = $request->post('apellido');
        $usuario->email = $request->post('email');
        $usuario->idioma_favorito = $request->post('idiomaFavorito');
        $usuario->codigo_postal = $request->post('codigoPostal');
        $usuario->calle = $request->post('calle');
        $usuario->nro_puerta = $request->post('nroPuerta');
        $usuario->observaciones_direccion = $request->post('observacionesDireccion');
        $usuario->latitud = $request->post('latitud');
        $usuario->longitud = $request->post('longitud');
        $usuario->save();
        if($usuario->almacenero()->exists()){
            $almacenero = Almacenero::find($request->nombre_usuario);
            $almacenero->delete();
        }
        
        if($usuario->admin()->exists()){
        $admin = Admin::find($request->nombre_usuario);
        $admin->delete();
        }

        if($usuario->chofer()->exists()){
        $chofer = Chofer::find($request->nombre_usuario);
        $chofer->delete();
        }
        if($request->post('admin')){
            $admin = new Admin();
            $admin->nombre_usuario = $usuario->nombre_usuario;
            $admin->save();
        }
        if($request->post('chofer')){
            $chofer = new Chofer();
            $chofer->nombre_usuario = $usuario->nombre_usuario;
            $chofer->save();
        }
        if($request->post('almacenero')){
            $almacenero = new Almacenero();
            $almacenero->nombre_usuario = $usuario->nombre_usuario;
            $almacenero->save();
        }
        return redirect('/');
    }
}
