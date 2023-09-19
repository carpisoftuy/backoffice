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
            $usuario->isAdmin = !is_null(Admin::find($usuario->id));
            $usuario->isAlmacenero = !is_null(Almacenero::find($usuario->id));
            $usuario->isChofer = !is_null(Chofer::find($usuario->id));
        }
        return view('gestionUsuarios', ['usuarios' => $usuarios]);
    }
    public function CrearUsuario(Request $request){
        $usuario = new Usuario();
        $usuario->username = $request->post('username');
        $usuario->password = password_hash($request->post('password'), PASSWORD_DEFAULT);
        $usuario->nombre = $request->post('nombre');
        $usuario->apellido = $request->post('apellido');
        $usuario->save();
        if($request->post('admin')){
            $admin = new Admin();
            $admin->id = $usuario->id;
            $admin->save();
        }
        if($request->post('chofer')){
            $chofer = new Chofer();
            $chofer->id = $usuario->id;
            $chofer->save();
        }
        if($request->post('almacenero')){
            $almacenero = new Almacenero();
            $almacenero->id = $usuario->id;
            $almacenero->save();
        }
        return json_encode($usuario);
    }

    public function BorrarUsuario(Request $request){
        $usuario = Usuario::findOrFail($request->id);
        
        if(Almacenero::find($request->id)){
            $almacenero = Almacenero::find($request->id);
            $almacenero->delete();
        }
        
        if(Admin::find($request->id)){
            $admin = Admin::find($request->id);
            $admin->delete();
        }

        if(Chofer::find($request->id)){
            $chofer = Chofer::find($request->id);
            $chofer->delete();
        }
        
        $usuario->delete();

        return redirect('/');
    }

    public function CrearFormulario(Request $request){
        $usuario = Usuario::find($request->id);
        $usuario->isAdmin = $usuario->admin()->exists();
        $usuario->isAlmacenero = $usuario->almacenero()->exists();
        $usuario->isChofer = $usuario->chofer()->exists();
        return view('formularioUsuarios', ["usuario" => $usuario]);
    }

    public function UpdateUsuarios(Request $request){
        $usuario = Usuario::find($request->id);
        $usuario->username = $request->post('username');
        $usuario->password = password_hash($request->post('password'), PASSWORD_DEFAULT);
        $usuario->nombre = $request->post('nombre');
        $usuario->apellido = $request->post('apellido');
        $usuario->save();
        if($usuario->almacenero()->exists()){
            $almacenero = Almacenero::find($request->id);
            $almacenero->delete();
        }
        
        if($usuario->admin()->exists()){
        $admin = Admin::find($request->id);
        $admin->delete();
        }

        if($usuario->chofer()->exists()){
        $chofer = Chofer::find($request->id);
        $chofer->delete();
        }
        if($request->post('admin')){
            $admin = new Admin();
            $admin->id = $usuario->id;
            $admin->save();
        }
        if($request->post('chofer')){
            $chofer = new Chofer();
            $chofer->id = $usuario->id;
            $chofer->save();
        }
        if($request->post('almacenero')){
            $almacenero = new Almacenero();
            $almacenero->id = $usuario->id;
            $almacenero->save();
        }
        return redirect('/');
    }
}
