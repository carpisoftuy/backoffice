<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;
use Illuminate\Support\Facades\DB;

class AlmacenesController extends Controller
{
    /* public function GetAlmacenes(Request $request){
        return Almacen::all();
    }

    public function GetAlmacen(Request $request){
        return Almacen::find($request->id);
    }
    
    public function CreateAlmacen(Request $request){
        $almacen = new Almacen();
        $almacen->espacio = $request->post('espacio');
        $almacen->espacio_ocupado = $request->post('espacioOcupado');
        $almacen->codigo_postal = $request->post('codigoPostal');
        $almacen->calle = $request->post('calle');
        $almacen->nro_puerta = $request->post('nroPuerta');
        $almacen->observaciones_direccion = $request->post('observacionesDireccion');
        $almacen->latitud = $request->post('latitud');
        $almacen->longitud = $request->post('longitud');
        $almacen->save();
    }
    public function UpdateAlmacen(Request $request){
        $almacen = Almacen::find($request->id);
        $almacen->espacio = $request->post('espacio');
        $almacen->espacio_ocupado = $request->post('espacioOcupado');
        $almacen->codigo_postal = $request->post('codigoPostal');
        $almacen->calle = $request->post('calle');
        $almacen->nro_puerta = $request->post('nroPuerta');
        $almacen->observaciones_direccion = $request->post('observacionesDireccion');
        $almacen->latitud = $request->post('latitud');
        $almacen->longitud = $request->post('longitud');
        $almacen->save();
    }
    public function DeleteAlmacen(Request $request){
        $almacen = Almacen::find($request->id);
        $almacen->delete();
    } */

    public function GetAlmacenes(Request $request){
        return Almacen::join('ubicacion', 'ubicacion.id', '=', 'almacen.id_ubicacion')->get();

    }

    public function GetAlmacen(Request $request){
        return Almacen::find($request->id);
    }
    
    public function CreateAlmacen(Request $request){
        $almacen = new Almacen();
        $almacen->espacio = $request->post('espacio');
        $almacen->espacio_ocupado = $request->post('espacio_ocupado');
        $almacen->id_ubicacion = $request->post('id_ubicacion');
        $almacen->save();
        return Almacen::find($request->id);
    }
    public function UpdateAlmacen(Request $request){
        $almacen = Almacen::find($request->id);
        $almacen->espacio = $request->espacio;
        $almacen->espacio_ocupado = $request->espacio_ocupado;
        $almacen->id_ubicacion = $request->id_ubicacion;
        $almacen->save();
        return Almacen::find($request->id);
    }
    public function DeleteAlmacen(Request $request){
        $almacen = Almacen::find($request->id);
        $almacen->delete();
    }

    public function menuAlmacenes(Request $request){

        $almacenes = DB::table('almacen')
        ->join('ubicacion','ubicacion.id','=','almacen.id_ubicacion')
        ->select('almacen.id', 'espacio', 'espacio_ocupado', 'id_ubicacion', 'direccion', 'codigo_postal')
        ->get();

        $direcciones = DB::table('ubicacion')
        ->select('*')
        ->get();

        return view('gestionAlmacenes', [
            'almacenes' => $almacenes,
            'direcciones' => $direcciones
        ]);

    }

}
