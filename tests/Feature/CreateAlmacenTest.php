<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Almacen;

class CreateAlmacenTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateAlmacenCorrectamente() {
        $response = $this->post('/v2/almacenes', [

            'espacio' => 3020,
            'espacio_ocupado' => 1000,
            'id_ubicacion' => 1

        ]);

        $response->assertStatus(200);

        $almacenCreadoId = Almacen::latest('id')->first()->id;

        if ($almacenCreadoId) {
            Almacen::destroy($almacenCreadoId);
        }

    }

    public function testCreateAlmacenSinDatos() {
        $response = $this->post('/v2/almacenes', [
            'espacio' => "",
            'espacio_ocupado' => "",
            'id_ubicacion' => ""
        ]);

        $response->assertStatus(500);

    }

    public function testCreateAlmacenConDatoIncorrecto() {
        $response = $this->post('/v2/almacenes', [
            'espacio' => "asdas",
            'espacio_ocupado' => "hola",
            'id_ubicacion' => ""
        ]);

        $response->assertStatus(500);

    }
}
