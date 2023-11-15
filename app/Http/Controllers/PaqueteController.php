<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Paquete;
use App\Models\Almacen;
use App\Models\Ubicacion;
use App\Models\PaqueteParaRecoger;
use App\Models\PaqueteParaEntregar;
use App\Models\PaqueteRecogido;
use App\Models\PaqueteEntregado;
use App\Models\CargaPaquete;
use App\Models\CargaPaqueteFin;
use App\Models\BultoContiene;
use App\Models\BultoContieneFin;
use App\Models\AlmacenContienePaquete;
use App\Models\AlmacenContienePaqueteFin;


class PaqueteController extends Controller
{
    public function AsignarCamioneta (Request $request){

        DB::table('carga_paquete')->insert([
            'id_paquete' => $request->id_paquete,
            'id_vehiculo' => $request->id_vehiculo,
            'fecha_inicio' => now()
        ]);

        return redirect('/backoffice/paquetes');

    }

    public function FinalizarTransito (Request $request){

        $id = $request->id;

        DB::table('carga_paquete_fin')->insert([

            'id' => $id,
            'fecha_fin' => now()

        ]);

        return redirect('/backoffice/paquetes');
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
        return redirect('/backoffice/paquetes');
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
        /*if($paqueteParaEntregar){
            $paqueteParaEntregar->delete();
        }
        if($paqueteParaRecoger){
            $paqueteParaRecoger->delete();
        }*/

        $paquete->delete();

        return redirect('/backoffice/paquetes');
    }

    public function menuPaquetes(Request $request){
        $almacenes = DB::table('almacen')
            ->join('ubicacion','ubicacion.id','=','almacen.id_ubicacion')
            ->select('almacen.id', 'espacio', 'espacio_ocupado', 'id_ubicacion', 'direccion', 'codigo_postal')
            ->get();

        $camionetas = DB::table('vehiculo')
            ->whereIn('vehiculo.id',
                DB::table('camioneta')->select('id')
            )
            ->get();

        $paquetes = DB::table('paquete')
            ->select('paquete.*', 'ubicacion_entregar.direccion as direccion_entregar', 'ubicacion_entregar.codigo_postal as codigo_postal_entregar', 'ubicacion_recoger.direccion as direccion_recoger', 'ubicacion_recoger.codigo_postal as codigo_postal_recoger')
            ->whereNotIn('paquete.id',
                DB::table('paquete_recogido')
                ->select('id')
            )
            ->whereNotIn('paquete.id',
                DB::table('paquete_entregado')
                ->select('id')
            )
            ->leftJoin('paquete_para_entregar', 'paquete_para_entregar.id', '=', 'paquete.id')
            ->leftJoin('ubicacion as ubicacion_entregar', 'paquete_para_entregar.ubicacion_destino', '=', 'ubicacion_entregar.id')
            ->leftJoin('paquete_para_recoger', 'paquete_para_recoger.id', '=', 'paquete.id')
            ->leftJoin('almacen', 'almacen.id', '=', 'paquete_para_recoger.almacen_destino')
            ->leftJoin('ubicacion as ubicacion_recoger', 'almacen.id_ubicacion', '=', 'ubicacion_recoger.id')
            ->get();

        $bultos = DB::table('bulto')
            ->whereNotIn('bulto.id',
                DB::table('bulto_desarmado')
                ->select('id')
            )
            ->select('*')
            ->get();

        $paquetesEnCamioneta = DB::table('paquete')
            ->join('carga_paquete', 'carga_paquete.id_paquete', '=', 'paquete.id')
            ->whereNotIn('carga_paquete.id',
                DB::table('carga_paquete_fin')
                ->select('id')
            )
            ->join('vehiculo', 'carga_paquete.id_vehiculo', '=', 'vehiculo.id')
            ->select('*', 'carga_paquete.id as carga_paquete_id', 'paquete.id')
            ->get();

        $paquetesEnBulto = DB::table('paquete')
            ->join('bulto_contiene', 'paquete.id', '=', 'bulto_contiene.id_paquete')
            ->whereNotIn('bulto_contiene.id',
                DB::table('bulto_contiene_fin')
                ->select('id')
            )
            ->select('*', 'bulto_contiene.id as bulto_contiene_id', 'paquete.id')
            ->get();

        $paquetesEnAlmacen = DB::table('paquete')
            ->join('almacen_contiene_paquete', 'paquete.id', '=', 'almacen_contiene_paquete.id_paquete')
            ->whereNotIn('almacen_contiene_paquete.id',
                DB::table('almacen_contiene_paquete_fin')
                ->select('id')
            )
            ->join('almacen', 'almacen.id' , '=', 'almacen_contiene_paquete.id_almacen')
            ->join('ubicacion', 'ubicacion.id', '=', 'almacen.id_ubicacion')
            ->select('*', 'paquete.id', 'almacen_contiene_paquete.id as paquete_almacen_id')
            ->get();

        $paquetesNoCargados = DB::table('paquete')
            ->whereNotIn('paquete.id',
                DB::table('carga_paquete')
                ->whereNotIn('carga_paquete.id',
                    DB::table('carga_paquete_fin')
                    ->select('id')
                )
                ->select('carga_paquete.id_paquete')
            )
            ->whereNotIn('paquete.id',
                DB::table('bulto_contiene')
                ->whereNotIn('bulto_contiene.id',
                    DB::table('bulto_contiene_fin')
                    ->select('id')
                )
                ->select('bulto_contiene.id_paquete')
            )
            ->whereNotIn('paquete.id',
                DB::table('almacen_contiene_paquete')
                ->whereNotIn('almacen_contiene_paquete.id',
                    DB::table('almacen_contiene_paquete_fin')
                    ->select('id')
                )
                ->select('almacen_contiene_paquete.id_paquete')
            )
            ->whereNotIn('paquete.id',
                DB::table('paquete_entregado')
                ->select('id')
            )
            ->whereNotIn('paquete.id',
                DB::table('paquete_recogido')
                ->select('id')
            )
            ->select('*', 'paquete.id')
            ->get();

        return view('gestionPaquetes', [
            'paquetes' => $paquetes,
            'almacenes' => $almacenes,
            'paquetesEnCamioneta' => $paquetesEnCamioneta,
            'paquetesNoCargados' => $paquetesNoCargados,
            'paquetesEnBulto' => $paquetesEnBulto,
            'paquetesEnAlmacen' => $paquetesEnAlmacen,
            'camionetas' => $camionetas,
            'bultos' => $bultos
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

    public function AsignarBulto(Request $request){
        $bultoContiene = new BultoContiene();
        $bultoContiene->id_paquete = $request->id_paquete;
        $bultoContiene->id_bulto = $request->id_bulto;
        $bultoContiene->fecha_inicio = now();

        $bultoContiene->save();

        return redirect('/backoffice/paquetes');
    }

    public function DesasignarBulto(Request $request){
        $bultoContieneFin = new BultoContieneFin();
        $bultoContieneFin->id = $request->id;
        $bultoContieneFin->fecha_fin = now();

        $bultoContieneFin->save();

        return redirect('/backoffice/paquetes');
    }

    public function AsignarAlmacen(Request $request){
        $almacenContienePaquete = new AlmacenContienePaquete();
        $almacenContienePaquete->id_paquete = $request->id_paquete;
        $almacenContienePaquete->id_almacen = $request->id_almacen;
        $almacenContienePaquete->fecha_inicio = now();

        $almacenContienePaquete->save();

        return redirect('/backoffice/paquetes');
    }

    public function DesasignarAlmacen(Request $request){
        $almacenContienePaqueteFin = new AlmacenContienePaqueteFin();
        $almacenContienePaqueteFin->id = $request->id;
        $almacenContienePaqueteFin->fecha_fin = now();

        $almacenContienePaqueteFin->save();

        return redirect('/backoffice/paquetes');
    }

    public function EntregarPaquete(Request $request){
        $paquete = Paquete::leftJoin('paquete_para_entregar', 'paquete.id', '=', 'paquete_para_entregar.id')
            ->leftJoin('paquete_para_recoger', 'paquete.id', '=', 'paquete_para_recoger.id')
            ->select('paquete_para_recoger.id as para_recoger', 'paquete_para_entregar.id as para_entregar', 'paquete.id')
            ->where('paquete.id', '=', $request->id)
            ->first();

        if($paquete->para_entregar != null){
            $paqueteEntregado = new PaqueteEntregado();
            $paqueteEntregado->id = $paquete->para_entregar;
            $paqueteEntregado->fecha_entregado = now();
            $paqueteEntregado->save();
        }
        if($paquete->para_recoger != null){
            $paqueteRecogido = new PaqueteRecogido();
            $paqueteRecogido->id = $paquete->para_recoger;
            $paqueteRecogido->fecha_recogido = now();
            $paqueteRecogido->save();
        }

        $almacenesContienePaquete = AlmacenContienePaquete::where('almacen_contiene_paquete.id_paquete', '=', $paquete->id)
            ->whereNotIn('almacen_contiene_paquete.id',
                DB::table('almacen_contiene_paquete_fin')
                ->select('id')
            )
            ->get();

        foreach($almacenesContienePaquete as $almacenContienePaquete){
            $almacenContienePaqueteFin = new AlmacenContienePaqueteFin();
            $almacenContienePaqueteFin->id = $almacenContienePaquete->id;
            $almacenContienePaqueteFin->fecha_fin = now();

            $almacenContienePaqueteFin->save();
        }

        $paquetesEnBulto = BultoContiene::where('bulto_contiene.id_paquete', '=', $paquete->id)
            ->whereNotIn('bulto_contiene.id',
                DB::table('bulto_contiene_fin')
                ->select('id')
            )
            ->get();

        foreach($paquetesEnBulto as $paqueteEnBulto){
            $paqueteEnBultoFin = new BultoContieneFin();
            $paqueteEnBultoFin->id = $paqueteEnBulto->id;
            $paqueteEnBultoFin->fecha_fin = now();

            $paqueteEnBultoFin->save();
        }

        $paquetesEnCamioneta = CargaPaquete::where('carga_paquete.id_paquete', '=', $paquete->id)
            ->whereNotIn('carga_paquete.id',
                DB::table('carga_paquete_fin')
                ->select('id')
            )
            ->get();

        foreach($paquetesEnCamioneta as $paqueteEnCamioneta){
            $paquetesEnCamionetaFin = new CargaPaqueteFin();
            $paquetesEnCamionetaFin->id = $paqueteEnCamioneta->id;
            $paquetesEnCamionetaFin->fecha_fin = now();

            $paquetesEnCamionetaFin->save();
        }


        return redirect('/backoffice/paquetes');
    }


}
