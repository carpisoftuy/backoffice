<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Vehiculo;
class UpdateVehiculoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUpdateVehiculo(){

        $vehiculo = Vehiculo::create([
            'codigo_pais' => "GU",
            'matricula' => "SBZ-1441",
            'capacidad_volumen' => 1000,
            'capacidad_peso' => 1000,
            'peso_ocupado' => 0,
            'volumen_ocupado' => 0
        ]);

        $nuevoCodigo = "CY";
        $nuevaMatricula = "OLA-0000";

        $response = $this->put("/vehiculos/{$vehiculo->id}", [
            'codigo_pais' => $nuevoCodigo,
            'matricula' => $nuevaMatricula,
            'capacidad_volumen' => 1000,
            'capacidad_peso' => 1000,
            'peso_ocupado' => 0,
            'volumen_ocupado' => 0
        ]);

        $response->assertStatus(302);

        // Verifica que los datos del vehiculo actualizado coincidan con los nuevos datos
        $this->assertEquals($nuevoCodigo, $vehiculo->fresh()->codigo_pais);

        $vehiculo->delete();

    }
}
