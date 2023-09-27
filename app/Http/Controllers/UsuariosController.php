<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Admin;
use App\Models\Chofer;
use App\Models\Almacenero;
use App\Models\Informacion;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function MenuUsuarios(Request $request){
        $usuarios = Usuario::all();
        foreach($usuarios as $usuario){
            $usuario->isAdmin = !is_null(Admin::find($usuario->id));
            $usuario->isAlmacenero = !is_null(Almacenero::find($usuario->id));
            $usuario->isChofer = !is_null(Chofer::find($usuario->id));
        }

        $choferes = DB::table('usuario')
        ->select('*')
        ->join('chofer', 'chofer.id', '=', 'usuario.id')
        ->where([])
        ->get();

        $paquetes = DB::table('paquete')
        ->select('*')
        ->where([])
        ->get();

        $camionetas = DB::table('camioneta')
        ->select('*')
        ->join('vehiculo', 'camioneta.id', '=', 'vehiculo.id')
        ->where([])
        ->get();

        $paquetes_finalizados = DB::table('carga_paquete_fin')
        ->select('id');

        $paquetes_en_transito = DB::table('carga_paquete')
        ->select('paquete.id', 'usuario.nombre', 'usuario.apellido', 'vehiculo.matricula', 'paquete.peso', 'paquete.volumen', 'carga_paquete.id as id_paquete')
        ->join('paquete', 'carga_paquete.id_paquete', '=', 'paquete.id')
        ->join('camioneta', 'carga_paquete.id_vehiculo', '=', 'camioneta.id')
        ->join('vehiculo', 'camioneta.id', '=', 'vehiculo.id')
        ->join('maneja', 'maneja.id_vehiculo', '=', 'vehiculo.id')
        ->join('chofer', 'chofer.id', '=', 'maneja.id_usuario')
        ->join('usuario', 'usuario.id', '=', 'chofer.id')
        ->whereNotIn('carga_paquete.id', $paquetes_finalizados)
        ->get();

        return view('gestionUsuarios', 
            ['usuarios' => $usuarios, 
            'choferes' => $choferes,
            'paquetes' => $paquetes,
            'camionetas' => $camionetas,
            'paquetes_en_transito' => $paquetes_en_transito]);
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
        $usuario->isAdmin = !is_null(Admin::find($usuario->id));
        $usuario->isAlmacenero = !is_null(Almacenero::find($usuario->id));
        $usuario->isChofer = !is_null(Chofer::find($usuario->id));
        $usuario->informaciones = Informacion::where("id_usuario", "=", $usuario->id)->get();
        return view('formularioUsuarios', ["usuario" => $usuario]);
    }

    public function UpdateUsuarios(Request $request){
        $usuario = Usuario::find($request->id);
        $usuario->username = $request->post('username');
        $usuario->password = password_hash($request->post('password'), PASSWORD_DEFAULT);
        $usuario->nombre = $request->post('nombre');
        $usuario->apellido = $request->post('apellido');
        $usuario->save();
        
        if($request->post('admin') && is_null(Admin::find($usuario->id))){
            $almacenero = new Admin();
            $almacenero->id = $usuario->id;
            $almacenero->save();
        } 
        if(!$request->post('admin') && !is_null(Admin::find($usuario->id))){
            $almacenero = Admin::find($request->id);
            $almacenero->delete();
        }
        if($request->post('almacenero') && is_null(Almacenero::find($usuario->id))){
            $almacenero = new Almacenero();
            $almacenero->id = $usuario->id;
            $almacenero->save();
        } 
        if(!$request->post('almacenero') && !is_null(Almacenero::find($usuario->id))){
            $almacenero = Almacenero::find($request->id);
            $almacenero->delete();
        }
        if($request->post('chofer') && is_null(Chofer::find($usuario->id))){
            $almacenero = new Chofer();
            $almacenero->id = $usuario->id;
            $almacenero->save();
        } 
        if(!$request->post('chofer') && !is_null(Chofer::find($usuario->id))){
            $almacenero = Chofer::find($request->id);
            $almacenero->delete();
        }
        
        return redirect('/');
    }

    public function AsignarChoferACamioneta(Request $request){

        $maneja = DB::table('maneja')
        ->insert(['id_vehiculo' => $request->post('id_vehiculo'),
                  'id_usuario' => $request->post('id_usuario')]);

    }

}
