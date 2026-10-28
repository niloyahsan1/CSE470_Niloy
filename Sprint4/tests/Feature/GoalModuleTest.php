<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\Models\User;
use Tests\TestCase;

class GoalModuleTest extends TestCase
{
    private function createCustomerWithProfile(float $height = 68, float $weight = 70): User
    {
        $user = new User();
        $user->fname = 'John';
        $user->lname = 'Doe';
        $user->username = 'johndoe_' . uniqid();
        $user->email = 'goaluser_' . uniqid() . '@example.com';
        $user->ptype = 'Customer';
        $user->pass = bcrypt('secret123');
        $user->save();

        Profile::create([
            'email' => $user->email,
            'age' => '21 - 26',
            'gender' => 'Male',
            'height' => $height,
            'current_weight' => $weight,
        ]);

        return $user;
    }

    public function test_authenticated_customer_can_view_goal_form(): void
    {
        $user = $this->createCustomerWithProfile();

        $response = $this->actingAs($user)->get('/goal');
        $response->assertStatus(200);
        $response->assertViewIs('goal');
        $response->assertViewHas('age', '21 - 26');
    }

    public function test_goal_validation_rejects_invalid_goal_values(): void
    {
        $user = $this->createCustomerWithProfile();

        $response = $this->actingAs($user)->post('/goal', [
            'weight' => 'InvalidChoice',
        ]);

        $response->assertSessionHasErrors(['weight']);
    }

    public function test_authenticated_customer_can_set_valid_goal_and_redirects_to_table(): void
    {
        $user = $this->createCustomerWithProfile();

        $response = $this->actingAs($user)->post('/goal', [
            'weight' => 'Decrease',
        ]);

        $response->assertRedirect(route('table'));

        $this->assertDatabaseHas('goal', [
            'email' => $user->email,
            'weight' => 'Decrease',
        ]);
    }

    public function test_customer_can_view_goal_done_summary(): void
    {
        $user = $this->createCustomerWithProfile(68, 70); // BMI ~ 23.5 (Normal)

        $this->actingAs($user)->post('/goal', ['weight' => 'Decrease']);

        $response = $this->actingAs($user)->get('/goaldone');
        $response->assertStatus(200);
        $response->assertViewIs('goal_summary');
        $response->assertViewHas('show', 'Normal Weight');
    }
}

