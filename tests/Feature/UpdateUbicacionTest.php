<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Ubicacion;

class UpdateUbicacionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUpdateubicacion(){

        $ubicacion = Ubicacion::create([
            'direccion' => "vilardebo 2024",
            'codigo_postal' => "11800",
            'latitud' => -34.87958216,
            'longitud' => -56.17532811,
        ]);

        $nuevaDireccion = "Help me";

        $response = $this->put("/ubicaciones/{$ubicacion->id}", [
            'direccion' => $nuevaDireccion,
            'codigo_postal' => "11800",
            'latitud' => -34.87958216,
            'longitud' => -56.17532811,
        ]);

        $response->assertStatus(200);

        // Verifica que los datos del ubicacion actualizado coincidan con los nuevos datos
        $this->assertEquals($nuevaDireccion, $ubicacion->fresh()->direccion);

        $ubicacion->delete();

    }
}
