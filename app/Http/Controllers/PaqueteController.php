<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Paquete;

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
        $paquete = new Paquete();
        $paquete->fecha_despacho = now();
        $paquete->peso = $request->peso;
        $paquete->volumen = $request->volumen;
        $paquete->save();
    }

    public function GetPaquete(Request $request){
        return Paquete::find($request->id);
    }

    public function UpdatePaquete(Request $request){
        $paquete = Paquete::find($request->id);
        $paquete->volumen = $request->post('volumen');
        $paquete->peso = $request->post('peso');
        $paquete->save();
        return Paquete::find($request->id);
    }

    public function DeletePaquete(Request $request){ 
        $paquete = Paquete::find($request->id);
        $paquete->delete();
    }

    public function menuPaquetes(Request $request){

        $paquetes = DB::table('paquete')
        ->select('*')
        ->get();

        return view('gestionPaquetes', [
            'paquetes' => $paquetes,
        ]);

    }

}
