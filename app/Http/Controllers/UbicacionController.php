<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ubicacion;

class UbicacionController extends Controller
{
    //

    public function GetUbicaciones(Request $request){
        return Ubicacion::all();
    }

    public function GetUbicacion(Request $request){
        return Ubicacion::find($request->id);
    }

    public function CreateUbicacion(request $request){
        $ubicacion = new Ubicacion();
        $ubicacion->direccion = $request->post('direccion');
        $ubicacion->codigo_postal = $request->post('codigo_postal');
        $ubicacion->latitud = $request->post('latitud');
        $ubicacion->longitud = $request->post('longitud');
        $ubicacion->save();

        return $ubicacion;
    }

    public function UpdateUbicacion(Request $request){
        $ubicacion = Ubicacion::find($request->id);
        $ubicacion->direccion = $request->direccion;
        $ubicacion->codigo_postal = $request->codigo_postal;
        $ubicacion->latitud = $request->latitud;
        $ubicacion->longitud = $request->longitud;
        $ubicacion->save();
        return Ubicacion::find($request->id);
    }

    public function DeleteUbicacion(Request $request){
        $ubicacion = Ubicacion::find($request->id);
        $ubicacion->delete();
    }

}
