<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class ProfileModuleTest extends TestCase
{
    private function createCustomerUser(): User
    {
        $user = new User();
        $user->fname = 'Jane';
        $user->lname = 'Doe';
        $user->username = 'janedoe';
        $user->email = 'test_' . uniqid() . '@example.com';
        $user->ptype = 'Customer';
        $user->pass = bcrypt('secret123');
        $user->save();

        return $user;
    }

    public function test_authenticated_customer_can_view_profile_form(): void
    {
        $user = $this->createCustomerUser();

        $response = $this->actingAs($user)->get('/profile');
        $response->assertStatus(200);
        $response->assertViewIs('profile');
    }

    public function test_profile_update_validation_fails_on_missing_or_negative_inputs(): void
    {
        $user = $this->createCustomerUser();

        $response = $this->actingAs($user)->post('/profile', [
            'age' => '',
            'gender' => '',
            'height' => -5,
            'current_weight' => 0,
        ]);

        $response->assertSessionHasErrors(['age', 'gender', 'height', 'current_weight']);
    }

    public function test_authenticated_customer_can_save_profile_and_redirects_to_goal(): void
    {
        $user = $this->createCustomerUser();

        $response = $this->actingAs($user)->post('/profile', [
            'age' => '21 - 26',
            'gender' => 'Female',
            'height' => 65,
            'current_weight' => 58,
        ]);

        $response->assertRedirect(route('goal.show'));

        $this->assertDatabaseHas('profile', [
            'email' => $user->email,
            'age' => '21 - 26',
            'gender' => 'Female',
            'height' => 65,
            'current_weight' => 58,
        ]);
    }

    public function test_authenticated_customer_can_view_profile_summary(): void
    {
        $user = $this->createCustomerUser();

        $this->actingAs($user)->post('/profile', [
            'age' => '21 - 26',
            'gender' => 'Female',
            'height' => 65,
            'current_weight' => 58,
        ]);

        $response = $this->actingAs($user)->get('/UserProfile');
        $response->assertStatus(200);
        $response->assertViewIs('profile_summary');
        $response->assertViewHas('cusinfo');
        $response->assertViewHas('cuspro');
    }
}

