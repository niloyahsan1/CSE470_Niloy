<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Goal;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;

class loginauthCRTest extends TestCase
{
    use RefreshDatabase; 

    public function test_create_customer_and_go_to_profile_show()
    {
        $formData = [
            'fname' => 'Niloy',
            'lname' => 'Ahsan',
            'username' => 'niloy123',
            'email' => 'niloy123@gmail.com',
            'ptype' => 'Customer',
            'pass' => 'password',
        ];

        $response = $this->post('/signupaa', $formData);

        $response->assertRedirect(route('profile_show', [
            'email' => $formData['email']
        ]));

        $this->assertDatabaseHas('signup_table', [
            'fname' => $formData['fname'],
            'lname' => $formData['lname'],
            'username' => $formData['username'],
            'email' => $formData['email'],
            'ptype' => $formData['ptype'],
        ]);
    }

    public function test_create_consultant_and_shows_consultantpage()
    {
        $formData = [
            'fname' => 'Chaity',
            'lname' => 'Ghosh',
            'username' => 'chaityRG',
            'email' => 'chaityrani@gmail.com',
            'ptype' => 'Consultant',
            'pass' => 'password',
        ];

        $response = $this->post('/signupaa', $formData);

        $response->assertViewIs('consultantpage')
                 ->assertViewHas('email', $formData['email']);

        $this->assertDatabaseHas('signup_table', [
            'fname' => $formData['fname'],
            'lname' => $formData['lname'],
            'username' => $formData['username'],
            'email' => $formData['email'],
            'ptype' => $formData['ptype'],
            'pass' => $formData['pass'],
        ]);
    }

    public function test_valid_user()
    {
        $user = User::factory()->create([
            'email' => 'test@gmail.com',
            'pass' => '0000',
            'ptype' => 'Customer',
        ]);

        $response = $this->post('/loginauth', [
            'email' => 'test@gmail.com',
            'pass' => '0000',
        ]);

        $response->assertStatus(200)
                 ->assertViewIs('profile')
                 ->assertViewHas('email', 'test@gmail.com');
    }
}
