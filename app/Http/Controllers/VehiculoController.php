<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vehiculo;
use App\Http\Requests\Camion;
use App\Http\Requests\Camioneta;
use App\Http\Controllers\Usuario;

class VehiculoController extends Controller
{   

    public function menuVehiculos(Request $request){

        $camionetas = DB::table('camioneta')
        ->select('*')
        ->join('vehiculo', 'camioneta.id', '=', 'vehiculo.id')
        ->where([])
        ->get();

        $camiones = DB::table('camion')
        ->select('*')
        ->join('vehiculo', 'camion.id', '=', 'vehiculo.id')
        ->get();

        $choferes = DB::table('usuario')
        ->select('*')
        ->join('chofer', 'chofer.id', '=', 'usuario.id')
        ->where([])
        ->get();

        $vehiculos = DB::table('vehiculo')
        ->select('*')
        ->get();


        return view('vehiculos', [
            'choferes' => $choferes,
            'camionetas' => $camionetas,
            'camiones' => $camiones,
            'vehiculos' => $vehiculos,
        ]);

    }

    public function CreateVehiculo(request $request){
        $vehiculo = new Vehiculo();
        $vehiculo->codigo_pais = $request->post('codigo_pais');
        $vehiculo->matricula = $request->post('matricula');
        $vehiculo->capacidad_volumen = $request->post('capacidad_volumen');
        $vehiculo->capacidad_peso = $request->post('capacidad_peso');
        $vehiculo->peso_ocupado = $request->post('peso_ocupado');
        $vehiculo->volumen_ocupado = $request->post('volumen_ocupado');
        $vehiculo->save();

        return $vehiculo;
    }

    public function GetVehiculos(request $request){
        return Vehiculo::all();
    }

    public function GetVehiculo(Request $request){
        return Vehiculo::find($request->id);
    }

    public function UpdateVehiculo(Request $request){
        $vehiculo = Vehiculo::find($request->id);
        $vehiculo->codigo_pais = $request->codigo_pais;
        $vehiculo->matricula = $request->matricula;
        $vehiculo->capacidad_volumen = $request->capacidad_volumen;
        $vehiculo->capacidad_peso = $request->capacidad_peso;
        $vehiculo->peso_ocupado = $request->peso_ocupado;
        $vehiculo->volumen_ocupado = $request->volumen_ocupado;
        $vehiculo->save();
        return Vehiculo::find($request->id);
    }
    public function DeleteVehiculo(Request $request){
        $vehiculo = Vehiculo::find($request->id);
        $vehiculo->delete();
    }

}
