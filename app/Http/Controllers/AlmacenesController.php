<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;

class AlmacenesController extends Controller
{
    public function GetAlmacenes(Request $request){
        return Almacen::all();
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
    }
}
