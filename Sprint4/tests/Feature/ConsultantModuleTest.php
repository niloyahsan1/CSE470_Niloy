<?php

namespace Tests\Feature;

use App\Models\Appointment;
use App\Models\User;
use Tests\TestCase;

class ConsultantModuleTest extends TestCase
{
    private function createConsultantUser(): User
    {
        $user = new User();
        $user->fname = 'Doc';
        $user->lname = 'Watson';
        $user->username = 'drwatson_' . uniqid();
        $user->email = 'consultant_' . uniqid() . '@example.com';
        $user->ptype = 'Consultant';
        $user->pass = bcrypt('secret123');
        $user->save();

        return $user;
    }

    public function test_authenticated_user_can_view_consultant_appointment_form(): void
    {
        $user = $this->createConsultantUser();

        $response = $this->actingAs($user)->get('/consultantform');
        $response->assertStatus(200);
        $response->assertViewIs('consultant');
    }

    public function test_booking_appointment_fails_on_empty_fields(): void
    {
        $user = $this->createConsultantUser();

        $response = $this->actingAs($user)->post('/consultantion', [
            'full_name' => '',
            'email' => 'not-an-email',
            'phn' => '',
            'msg' => '',
        ]);

        $response->assertSessionHasErrors(['full_name', 'email', 'phn', 'msg']);
    }

    public function test_authenticated_user_can_book_consultant_appointment(): void
    {
        $user = $this->createConsultantUser();

        $response = $this->actingAs($user)->post('/consultantion', [
            'full_name' => 'Alice Cooper',
            'email' => 'alice@example.com',
            'phn' => '01700000000',
            'msg' => 'Need personalized diet consultation.',
        ]);

        $response->assertStatus(200);
        $response->assertViewIs('consultant_appointment_confirmation');

        $this->assertDatabaseHas('user_appo', [
            'email' => 'alice@example.com',
            'full_name' => 'Alice Cooper',
        ]);
    }

    public function test_consultant_can_view_dashboard_with_appointments(): void
    {
        $consultant = $this->createConsultantUser();

        Appointment::create([
            'full_name' => 'Patient X',
            'email' => 'patientx@example.com',
            'phn' => '01800000000',
            'msg' => 'Regular checkup',
        ]);

        $response = $this->actingAs($consultant)->get('/consultant-dashboard');
        $response->assertStatus(200);
        $response->assertViewIs('consultantpage');
        $response->assertViewHas('appointments');
    }
}

