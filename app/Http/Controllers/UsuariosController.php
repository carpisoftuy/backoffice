<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Admin;
use App\Models\Chofer;
use App\Models\Almacenero;
use App\Models\Maneja;
use App\Models\ManejaFin;
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
        ->get();

        $paquetes = DB::table('paquete')
        ->select('*')
        ->get();

        $camionetas = DB::table('camioneta')
        ->select('*')
        ->join('vehiculo', 'camioneta.id', '=', 'vehiculo.id')
        ->get();

        $vehiculos = DB::table('vehiculo')
        ->select('*')
        ->get();

        $manejas = DB::table('maneja')
        ->select('maneja.*', 'vehiculo.*', 'usuario.*', 'maneja.id')
        ->join('vehiculo', 'vehiculo.id', '=', 'maneja.id_vehiculo')
        ->join('usuario', 'usuario.id', '=', 'maneja.id_usuario')
        ->whereNotIn('maneja.id',
            DB::table('maneja_fin')
            ->select('id')
        )->get();

        $camiones = DB::table('camion')
        ->select('*')
        ->join('vehiculo', 'camion.id', '=', 'vehiculo.id')
        ->get();

        return view('gestionUsuarios',
            [
            'usuarios' => $usuarios,
            'choferes' => $choferes,
            'paquetes' => $paquetes,
            'camionetas' => $camionetas,
            'camiones' => $camiones,
            'vehiculos' => $vehiculos,
            'manejas' => $manejas
        ]);
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
        return redirect('/backoffice/usuarios');
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

        return redirect('/backoffice/usuarios');
    }

    public function CrearFormulario(Request $request){
        $usuario = Usuario::find($request->id);
        $usuario->isAdmin = !is_null(Admin::find($usuario->id));
        $usuario->isAlmacenero = !is_null(Almacenero::find($usuario->id));
        $usuario->isChofer = !is_null(Chofer::find($usuario->id));
        return view('formularioUsuarios', ["usuario" => $usuario]);
    }

    public function UpdateUsuarios(Request $request){
        $usuario = Usuario::find($request->id);
        $usuario->username = $request->post('username');
        if ($request->post('password') != "") $usuario->password = password_hash($request->post('password'), PASSWORD_DEFAULT);
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

        return redirect('/backoffice/usuarios');
    }

    public function AsignarChoferAVehiculo(Request $request){

        $manejasPreexistentes = Maneja::where(function ($query) use ($request){
            $query->where('id_usuario', '=', $request->id_usuario)
            ->orWhere('id_vehiculo', '=', $request->id_vehiculo);
        })
        ->whereNotIn('maneja.id',
            DB::table('maneja_fin')
            ->select('id')
        )->get();


        if($manejasPreexistentes){
            foreach ($manejasPreexistentes as $manejaPreexistente) {
                $manejaFin = new ManejaFin();
                $manejaFin->id = $manejaPreexistente->id;
                $manejaFin->fecha_fin = now();
                $manejaFin->save();
            }
        }

        $maneja = DB::table('maneja')
        ->insert(['id_vehiculo' => $request->post('id_vehiculo'),
                  'id_usuario' => $request->post('id_usuario'),
                  'fecha_inicio' => now()
        ]);

        return redirect('/backoffice/usuarios');
    }

    public function DesasignarChoferAVehiculo(Request $request){

        $manejaPreexistente = Maneja::findOrFail($request->id);

        $manejaFin = new ManejaFin();
        $manejaFin->id = $manejaPreexistente->id;
        $manejaFin->fecha_fin = now();
        $manejaFin->save();

        return redirect('/backoffice/usuarios');
    }

}
