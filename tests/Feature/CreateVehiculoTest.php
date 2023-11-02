<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Vehiculo;

class CreateVehiculoCorrectamente extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateVehiculoCorrectamente() {
        $response = $this->post('v2/vehiculos', [

            'codigo_pais' => "UYU",
            'matricula' => "SBZ-1441",
            'capacidad_volumen' => 1000,
            'capacidad_peso' => 1000,
            'peso_ocupado' => 0,
            'volumen_ocupado' => 0


        ]);

        $response->assertStatus(201);

        $vehiculoCreadoId = Vehiculo::latest('id')->first()->id;

        if ($vehiculoCreadoId) {
            Vehiculo::destroy($vehiculoCreadoId);
        }

    }

    public function testCreateVehiculoIncorrectamente() {
        $response = $this->post('v2/vehiculos', [

            'codigo_pais' => 2,
            'matricula' => 3,
            'capacidad_volumen' => "",
            'capacidad_peso' => 1000,
            'peso_ocupado' => 0,
            'volumen_ocupado' => 0


        ]);

        $response->assertStatus(500);

    }


}
