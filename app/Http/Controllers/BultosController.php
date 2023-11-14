<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Bulto;
use App\Models\BultosDesarmado;
use App\Models\Almacen;
use App\Models\Camion;
use App\Models\AlmacenContieneBulto;
use App\Models\AlmacenContieneBultoFin;

class BultosController extends Controller
{
    public function GetBultos(Request $request){
        return Bulto::whereNotIn('bulto.id',
            DB::table('bulto_desarmado')
            ->select('id')
        )->get();
    }

    public function GetBulto(Request $request){
        return Bulto::find($request->id);
    }

    public function CreateBulto(Request $request){
        $bulto = new Bulto();
        $bulto->fecha_armado = now();
        $bulto->volumen = 0;
        $bulto->peso = 0;
        $bulto->almacen_destino = $request->post('almacen_destino');
        $bulto->save();

        return redirect('/backoffice/bultos');
    }
    public function DeleteBulto(Request $request){
        $bultoDesarmado = new BultosDesarmado();
        $bultoDesarmado->id = $request->id;
        $bultoDesarmado->fecha_desarmado = now();
        $bultoDesarmado->save();

        return redirect('/backoffice/bultos');
    }

    public function AsignarCamion (Request $request){

        DB::table('carga_bulto')->insert([
            'id_bulto' => $request->id_bulto,
            'id_vehiculo' => $request->id_vehiculo,
            'fecha_inicio' => now()
        ]);

        return redirect('/backoffice/bultos');

    }

    public function FinalizarTransito (Request $request){

        $id = $request->id;

        DB::table('carga_bulto_fin')->insert([

            'id' => $id,
            'fecha_fin' => now()

        ]);

        return redirect('/backoffice/bultos');
    }

    public function AsignarAlmacen(Request $request){
        $almacenContieneBulto = new AlmacenContieneBulto();
        $almacenContieneBulto->id_bulto = $request->id_bulto;
        $almacenContieneBulto->id_almacen = $request->id_almacen;
        $almacenContieneBulto->fecha_inicio = now();

        $almacenContieneBulto->save();

        return redirect('/backoffice/bultos');
    }

    public function DesasignarAlmacen(Request $request){
        $almacenContieneBultoFin = new AlmacenContieneBultoFin();
        $almacenContieneBultoFin->id = $request->id;
        $almacenContieneBultoFin->fecha_fin = now();

        $almacenContieneBultoFin->save();

        return redirect('/backoffice/bultos');
    }

    public function MenuBultos(Request $request){
        $bultos = Bulto::whereNotIn('bulto.id',
                DB::table('bulto_desarmado')
                ->select('id')
        )
        ->join('almacen', 'almacen.id', '=', 'bulto.almacen_destino')
        ->join('ubicacion', 'ubicacion.id', '=', 'almacen.id_ubicacion')
        ->select('*', 'bulto.id')
        ->get();

        $almacenes = Almacen::join('ubicacion', 'ubicacion.id', '=', 'almacen.id_ubicacion')->get();

        $camiones = Camion::join('vehiculo', 'vehiculo.id', '=', 'camion.id')->get();

        $bultosEnCamion = DB::table('bulto')
        ->join('carga_bulto', 'carga_bulto.id_bulto', '=', 'bulto.id')
        ->whereNotIn('carga_bulto.id',
            DB::table('carga_bulto_fin')
            ->select('id')
        )
        ->join('vehiculo', 'carga_bulto.id_vehiculo', '=', 'vehiculo.id')
        ->select('*', 'carga_bulto.id as carga_bulto_id', 'bulto.id')
        ->get();

        $bultosEnAlmacen = DB::table('bulto')
            ->join('almacen_contiene_bulto', 'bulto.id', '=', 'almacen_contiene_bulto.id_bulto')
            ->whereNotIn('almacen_contiene_bulto.id',
                DB::table('almacen_contiene_bulto_fin')
                ->select('id')
            )
            ->join('almacen', 'almacen.id' , '=', 'almacen_contiene_bulto.id_almacen')
            ->join('ubicacion', 'ubicacion.id', '=', 'almacen.id_ubicacion')
            ->select('*', 'bulto.id', 'almacen_contiene_bulto.id as bulto_almacen_id')
            ->get();

        $bultosNoCargados = Bulto::whereNotIn('bulto.id',
        DB::table('bulto_desarmado')
        ->select('id')
        )
        ->whereNotIn('bulto.id',
            DB::table('carga_bulto')
            ->whereNotIn('carga_bulto.id',
                DB::table('carga_bulto_fin')
                ->select('id')
            )
            ->select('carga_bulto.id_bulto')
        )
        ->whereNotIn('bulto.id',
            DB::table('almacen_contiene_bulto')
            ->whereNotIn('almacen_contiene_bulto.id',
                DB::table('almacen_contiene_bulto_fin')
                ->select('id')
            )
            ->select('almacen_contiene_bulto.id_bulto')
        )->get();

        return view('gestionBultos',[
            'bultos' => $bultos,
            'almacenes' => $almacenes,
            'camiones' => $camiones,
            'bultosEnCamion' => $bultosEnCamion,
            'bultosEnAlmacen' => $bultosEnAlmacen,
            'bultosNoCargados' => $bultosNoCargados
        ]);
    }
}
