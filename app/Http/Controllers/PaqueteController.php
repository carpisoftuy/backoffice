<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return redirect('../v2');

    }

    public function FinalizarTransito (Request $request){

        $id = $request->id;

        DB::table('carga_paquete_fin')->insert([

            'id' => $id,
            'fecha_fin' => now()

        ]);

        return redirect('/');
    }
}
