<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Paquete;

class CreatePaqueteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreatePaqueteCorrectamente() {
        $response = $this->post('/paquetes', [

            'peso' => 50,
            'volumen' => 48,

        ]);

        $response->assertStatus(200);

        $paqueteCreadoId = Paquete::latest('id')->first()->id;

        if ($paqueteCreadoId) {
            Paquete::destroy($paqueteCreadoId);
        }

    }

    public function testCreatePaqueteSinDatos() {
        $response = $this->post('/paquetes', [
            'peso' => "",
            'volumen' => "",
        ]);

        $response->assertStatus(500);

    }

    public function testCreatePaqueteConDatoIncorrecto() {
        $response = $this->post('/paquetes', [
            'peso' => "adas",
            'volumen' => "asdsad",
        ]);

        $response->assertStatus(500);

    }
}
