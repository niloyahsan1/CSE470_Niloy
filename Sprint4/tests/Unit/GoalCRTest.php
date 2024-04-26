<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Goal;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GoalCRTest extends TestCase
{
    use RefreshDatabase;

    public function test_setting_user_goal_in_the_database()
    {
        $formData = [
            'email' => 'abid@gmail.com',
            'age' => 22,
            'weight' => 75,
        ];

        $response = $this->post('/goal', $formData);

        $response->assertStatus(302);

        $response->assertRedirect(route('table', [
            'weight' => $formData['weight'],
            'email' => $formData['email'],
            'age' => $formData['age'],
        ]));

        $this->assertDatabaseHas('goal', [
            'email' => $formData['email'],
            'weight' => $formData['weight'],
        ]);
    }

    
    public function testshow_the_goal_view_with_info_from_database()
    {
        $formData = [
            'email' => 'abid@gmail.com',
            'age' => 22,
            'weight' => 75,
        ];

        $response = $this->post('/goal', $formData);

        $response->assertStatus(302);

        $response->assertRedirect(route('table', [
            'weight' => $formData['weight'],
            'email' => $formData['email'],
            'age' => $formData['age'],
        ]));

        $this->assertDatabaseHas('goal', [
            'email' => $formData['email'],
            'weight' => $formData['weight'],
        ]);
    }

}
