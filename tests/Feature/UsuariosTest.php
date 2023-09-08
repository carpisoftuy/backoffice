<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsuariosTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_paginaPrincipal(){
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    public function test_paginaCrearUsuario(){
        $response = $this->get('/usuarios/crear');
        $response->assertStatus(200);
    }
    public function test_crearUsuarioSinToken(){
        $response = $this->call('POST', '/usuarios/crear', array(
            
        )
        );
        $response->assertStatus(401);
    }
    public function test_crearUsuarioConTokenSinDatos(){
        $response = $this->call('POST', '/usuarios/crear', array(
            '_token' => csrf_token(),
        )
        );
        $response->assertStatus(400);
    }
    public function test_pedirUsuarioQueExiste(){
        $response = $this->get('/usuarios/crear/existo');
        $response->assertStatus(200);
    }
    public function test_pedirUsuarioQueNoExiste(){
        $response = $this->get('/usuarios/crear/noexisto');
        $response->assertStatus(404);
    }
}
