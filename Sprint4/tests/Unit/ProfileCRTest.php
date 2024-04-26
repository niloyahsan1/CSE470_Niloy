<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfileCRTest extends TestCase
{
    use RefreshDatabase; 

    public function test_create_user_profile_and_goto_goal()
    {
        $formData = [
            'email' => 'niloy@g.com',
            'age' => 23,
            'height' => 108,
            'current_weight' => 50,
            'gender' => 'Male',
        ];

        $response = $this->post('/profile', $formData);

        $response->assertRedirect(route('goal.show', [
            'email' => $formData['email'],
            'age' => $formData['age'],
        ]));
        
        $this->assertDatabaseHas('profile',[
            'email' => $formData['email'],
            'age' => $formData['age'],
            'height' => $formData['height'],
            'current_weight' => $formData['current_weight'],
            'gender' => $formData['gender'],
        ]);
    }

    public function test_show_profile_from_database()
    {
        $user = User::create([
            'fname' => 'Niloy',
            'lname' => 'Ahsan',
            'username' => 'niloy123',
            'email' => 'niloy@g.com',
            'pass' => '0000',
            'ptype' => 'Customer',
        ]);

        $profile = Profile::create([
            'email' => 'niloy@g.com',
            'age' => 23,
            'height' => 180,
            'current_weight' => 50,
            'gender' => 'Male',
        ]);

        $response = $this->get(route('profile_done', [
            'email' => 'niloy@g.com',
            'age' => 23,
            'weight' => 50,
        ]));

        $response->assertViewIs('profiledone')
                 ->assertViewHas('cuspro', $profile)
                 ->assertViewHas('cusinfo', $user)
                 ->assertViewHas('age', $profile->age)
                 ->assertViewHas('email', 'niloy@g.com')
                 ->assertViewHas('goal', $profile->weight);
    }
}
