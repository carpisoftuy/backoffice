<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bulto;
use App\Models\BultosDesarmado;

class BultosController extends Controller
{
    public function GetBultos(Request $request){
        // return Bulto::all();
        return Bulto::doesntHave('bultos_desarmado')
            ->get();
    }

    public function GetBulto(Request $request){
        return Bulto::find($request->id);
    }

    public function CreateBulto(Request $request){
        $bulto = new Bulto();
        $bulto->fecha_armado = now();
        $bulto->volumen = $request->post('volumen');
        $bulto->peso = $request->post('peso');
        $bulto->destino = $request->post('destino');
        $bulto->save();
    }
    public function UpdateBulto(Request $request){
        $bulto = Bulto::find($request->id);
        $bulto->volumen = $request->post('volumen');
        $bulto->peso = $request->post('peso');
        $bulto->destino = $request->post('destino');
        $bulto->save();
    }
    public function DeleteBulto(Request $request){
        $bultoDesarmado = new BultosDesarmado();
        $bultoDesarmado->id_bulto = $request->id;
        $bultoDesarmado->fecha_desarmado = now();
        $bultoDesarmado->save();
        
    }
}
