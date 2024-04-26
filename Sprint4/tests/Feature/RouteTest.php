<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * Test the '/' route.
     *
     * @return void
     */
    public function test_home_route()
    {
        $response = $this->get('/');
        $response->assertStatus(200)
                 ->assertViewIs('local_home');
    }

    public function test_login_route()
    {
        $response = $this->get('/login');
        $response->assertStatus(200)
                 ->assertViewIs('login');
    }

    public function test_signup_route()
    {
        $response = $this->get('/signup');
        $response->assertStatus(200)
                 ->assertViewIs('signup');
    }

    public function test_ddctable_route()
    {
        $response = $this->get('/ddctablee');
        $response->assertStatus(200)
                 ->assertViewIs('ddc');
    }

    public function test_localhome_route()
    {
        $response = $this->get('/localhome');
        $response->assertStatus(200)
            ->assertViewIs('local_home');
    }
}
