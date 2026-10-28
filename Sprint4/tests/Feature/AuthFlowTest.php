<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthFlowTest extends TestCase
{
    public function test_landing_page_is_accessible(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_login_page_is_accessible_to_guests(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_signup_page_is_accessible_to_guests(): void
    {
        $response = $this->get('/signup');
        $response->assertStatus(200);
    }

    public function test_unauthenticated_users_are_redirected_from_protected_routes(): void
    {
        $response = $this->get('/customer');
        $response->assertRedirect('/login');

        $response = $this->get('/profile');
        $response->assertRedirect('/login');

        $response = $this->get('/goal');
        $response->assertRedirect('/login');

        $response = $this->get('/diet-table');
        $response->assertRedirect('/login');

        $response = $this->get('/dailyactivity');
        $response->assertRedirect('/login');
    }

    public function test_login_validation_fails_with_invalid_credentials(): void
    {
        $response = $this->post('/login', [
            'email' => 'invalid-email',
            'pass' => '',
        ]);

        $response->assertSessionHasErrors(['email', 'pass']);
    }
}

