<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Vehiculo;

class GetVehiculoPorIdTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetVehiculoPorSuIdCorrecta() {
        
        $vehiculo = Vehiculo::create([
            'codigo_pais' => "UYU",
            'matricula' => "SBZ-1441",
            'capacidad_volumen' => 1000,
            'capacidad_peso' => 1000,
            'peso_ocupado' => 0,
            'volumen_ocupado' => 0
        ]);

        $response = $this->get("/v2/vehiculos/{$vehiculo->id}");

        $response->assertStatus(200);

        $vehiculo->delete();

    }   
}
