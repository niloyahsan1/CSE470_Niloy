<?php

namespace Tests\Feature;

use App\Models\Goal;
use App\Models\Profile;
use App\Models\User;
use Tests\TestCase;

class DietAndActivityModuleTest extends TestCase
{
    private function createCustomerWithFullProfile(string $age = '21 - 26', float $height = 68, float $weight = 70, string $goal = 'Decrease'): User
    {
        $user = new User();
        $user->fname = 'Alex';
        $user->lname = 'Smith';
        $user->username = 'alex_' . uniqid();
        $user->email = 'alex_' . uniqid() . '@example.com';
        $user->ptype = 'Customer';
        $user->pass = bcrypt('secret123');
        $user->save();

        Profile::create([
            'email' => $user->email,
            'age' => $age,
            'gender' => 'Male',
            'height' => $height,
            'current_weight' => $weight,
        ]);

        Goal::create([
            'email' => $user->email,
            'weight' => $goal,
        ]);

        return $user;
    }

    public function test_customer_can_view_diet_table_corresponding_to_age_and_goal(): void
    {
        $user = $this->createCustomerWithFullProfile('21 - 26', 68, 70, 'Decrease');

        $response = $this->actingAs($user)->get('/diet-table');
        $response->assertStatus(200);
        $response->assertViewIs('diet_chart');
        $response->assertViewHas('dietTableData');
        $response->assertViewHas('age', '21 - 26');
        $response->assertViewHas('goal', 'Decrease');
    }

    public function test_customer_can_view_daily_activity_based_on_bmi(): void
    {
        $user = $this->createCustomerWithFullProfile('21 - 26', 68, 70, 'Decrease'); // BMI ~ 23.5 (Normal)

        $response = $this->actingAs($user)->get('/dailyactivity');
        $response->assertStatus(200);
        $response->assertViewIs('daily_activity');
        $response->assertViewHas('activityTableData');
        $response->assertViewHas('show', 'Normal Weight');
    }
}

