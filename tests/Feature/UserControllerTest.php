<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /** @test */
    public function it_can_get_prev_login()
    {
        $response = $this->post('/api/auth/prevLogin', [
            'correo_est' => 'iboyer@tremblay.net',
            'password' => 'password'
        ]);
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_login()
    {
        $response = $this->post('/api/auth/login', [
            'correo_est' => 'iboyer@tremblay.net',
            'password' => 'password',
            'rol' => 1
        ]);
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_accept_privacy_policy()
    {
        $response = $this->get('/api/auth/aceptar-politicas/1');
        $response->assertStatus(200);
    }
}
