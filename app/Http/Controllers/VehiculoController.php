<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{

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
