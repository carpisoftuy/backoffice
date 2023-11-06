<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Ubicacion;

class CreateUbicacionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateUbicacionCorrectamente() {
        $response = $this->post('/ubicaciones', [
            'direccion' => "vilardebo 2024",
            'codigo_postal' => "11800",
            'latitud' => -34.87958216,
            'longitud' => -56.17532811,
        ]);

        $response->assertStatus(201);

        $ubicacionCreadaId = Ubicacion::latest('id')->first()->id;

        if ($ubicacionCreadaId) {
            Ubicacion::destroy($ubicacionCreadaId);
        }

    }

    public function testCreateUbicacionSinDatos() {
        $response = $this->post('/ubicaciones', [
            'direccion' => '',
            'codigo_postal' => '',
            'latitud' => '',
            'longitud' => ''
        ]);

        $response->assertStatus(500);

    }

    public function testCreateUbicacionConDatoIncorrecto() {
        $response = $this->post('/ubicaciones', [
            'direccion' => 'asda',
            'codigo_postal' => 122112,
            'latitud' => 'dsad',
            'longitud' => 'dsasd'
        ]);

        $response->assertStatus(500);

    }
}
