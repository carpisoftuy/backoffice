<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Paquete;
use App\Models\Almacen;
use App\Models\Ubicacion;
use App\Models\PaqueteParaRecoger;
use App\Models\PaqueteParaEntregar;
use App\Models\CargaPaquete;

class PaqueteController extends Controller
{
    public function AsignarCamioneta (Request $request){

        $paquete = $request->paquete;
        $camioneta = $request->camioneta;

        DB::table('carga_paquete')->insert([
            'id_paquete' => $paquete,
            'id_vehiculo' => $camioneta,
            'fecha_inicio' => now()
        ]);

        return redirect('./');

    }

    public function FinalizarTransito (Request $request){

        $id = $request->id;

        DB::table('carga_paquete_fin')->insert([

            'id' => $id,
            'fecha_fin' => now()

        ]);

        return redirect('/');
    }

    public function CreatePaquete (Request $request){
        DB::beginTransaction();
        $paquete = new Paquete();
        $paquete->fecha_despacho = now();
        $paquete->volumen = $request->post('volumen');
        $paquete->peso = $request->post('peso');
        $paquete->save();

        if($request->post('tipo') == 'entregar'){
            $ubicacion = new Ubicacion();
            $ubicacion->direccion = $request->direccion;
            $ubicacion->codigo_postal = $request->codigo_postal;
            $ubicacion->latitud = $request->latitud;
            $ubicacion->longitud = $request->longitud;
            $ubicacion->save();

            $paqueteParaEntregar = new PaqueteParaEntregar();
            $paqueteParaEntregar->id = $paquete->id;
            $paqueteParaEntregar->ubicacion_destino = $ubicacion->id;
            $paqueteParaEntregar->save();
        }

        if($request->post('tipo') == 'recoger'){
            $paqueteParaRecoger = new PaqueteParaRecoger();
            $paqueteParaRecoger->id = $paquete->id;
            $paqueteParaRecoger->almacen_destino = $request->post('almacen-destino');
            $paqueteParaRecoger->save();
        }

        DB::commit();
        return Paquete::find($paquete->id);
    }

    public function GetPaquete(Request $request){
        return Paquete::find($request->id);
    }

    public function UpdatePaquete(Request $request){
        $paquete = Paquete::find($request->id);
        $paquete->volumen = $request->post('volumen');
        $paquete->peso = $request->post('peso');
        $paquete->save();

        $paqueteParaEntregar = PaqueteParaEntregar::find($request->id);
        $paqueteParaRecoger = PaqueteParaRecoger::find($request->id);
        if($request->tipo == 'recoger'){
            if ($paqueteParaRecoger){
                $paqueteParaRecoger->almacen_destino = $request->almacen_destino;
                $paqueteParaRecoger->save();
            }
            if ($paqueteParaEntregar){
                $paqueteParaEntregar->delete();
                $paqueteParaRecoger = new PaqueteParaRecoger();
                $paqueteParaRecoger->id = $paquete->id;
                $paqueteParaRecoger->almacen_destino = $request->almacen_destino;
                $paqueteParaRecoger->save();
            }
        }
        if($request->tipo == 'entregar'){
            if ($paqueteParaEntregar){
                $paqueteParaEntregar->ubicacion_destino = $request->ubicacion_destino;
                $paqueteParaEntregar->save();
            }
            if ($paqueteParaRecoger){
                $paqueteParaRecoger->delete();
                $paqueteParaEntregar = new PaqueteParaEntregar();
                $paqueteParaEntregar->id = $paquete->id;
                $paqueteParaEntregar->ubicacion_destino = $request->ubicacion_destino;
                $paqueteParaEntregar->save();
            }
        }


        return redirect('/backoffice/paquetes');;
    }

    public function DeletePaquete(Request $request){
        $paqueteParaEntregar = PaqueteParaEntregar::find($request->id);
        $paqueteParaRecoger = PaqueteParaRecoger::find($request->id);
        $paquete = Paquete::find($request->id);
        if($paqueteParaEntregar){
            $paqueteParaEntregar->delete();
        }
        if($paqueteParaRecoger){
            $paqueteParaRecoger->delete();
        }

        $paquete->delete();

        return redirect('/backoffice/paquetes');
    }

    public function menuPaquetes(Request $request){

        $paquetes = DB::table('paquete')
        ->select('*')
        ->get();

        $almacenes = DB::table('almacen')
        ->join('ubicacion','ubicacion.id','=','almacen.id_ubicacion')
        ->select('almacen.id', 'espacio', 'espacio_ocupado', 'id_ubicacion', 'direccion', 'codigo_postal')
        ->get();

        return view('gestionPaquetes', [
            'paquetes' => $paquetes,
            'almacenes' => $almacenes,
        ]);

    }

    public function menuPaquete(Request $request){

        $paquete = Paquete::find($request->id);

        $almacenes = DB::table('almacen')
        ->join('ubicacion','ubicacion.id','=','almacen.id_ubicacion')
        ->select('almacen.id', 'espacio', 'espacio_ocupado', 'id_ubicacion', 'direccion', 'codigo_postal')
        ->get();

        $ubicaciones = Ubicacion::all();

        return view('modificarPaquete', [
            'paquete' => $paquete,
            'almacenes' => $almacenes,
            'ubicaciones' => $ubicaciones
        ]);

    }



}
