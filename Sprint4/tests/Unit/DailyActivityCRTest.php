<?php

namespace Tests\Unit;

use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DailyActivityCRTest extends TestCase
{
    use RefreshDatabase; 

    public function test_show_daily_activity()
    {
        $formData = [
            'email' => 'niloy@g.com',
            'age' => 23,
            'weight' => 50,
        ];

        $profile = Profile::create([
            'email' => 'niloy@g.com',
            'age' => 23,
            'height' => 180,
            'current_weight' => 50,
            'gender' => 'Male',
        ]);

        $BMI = 25;

        $activityTableData = collect([
            [
                'Activity_Type' => 'Brisk Walking',
                'Duration' => '30 minutes',
                'Frequency' => '5 days/week',
                'Intensity' => 'Moderate',
            ],
            [
                'Activity_Type' => 'Jogging/Running',
                'Duration' => '20-30 minutes',
                'Frequency' => '3-4 days/week',
                'Intensity' => 'Vigorous',
            ],
            [
                'Activity_Type' => 'Swimming',
                'Duration' => '30-45 minutes',
                'Frequency' => '3-4 days/week',
                'Intensity' => 'Moderate',
            ],
            [
                'Activity_Type' => 'Cycling',
                'Duration' => '45 minutes',
                'Frequency' => '3-4 days/week',
                'Intensity' => 'Moderate',
            ],
            [
                'Activity_Type' => 'Strength Training',
                'Duration' => '30-45 minutes',
                'Frequency' => '2-3 days/week',
                'Intensity' => 'Moderate to High',
            ],
            [
                'Activity_Type' => 'Yoga/Pilates',
                'Duration' => '45-60 minutes',
                'Frequency' => '2-3 days/week',
                'Intensity' => 'Light to Moderate',
            ],
        ]);

        DB::shouldReceive('table')->once()->with('bmi_norm')->andReturn($activityTableData);

        $response = $this->get('/dailyactivity', $formData);

        $response->assertViewIs('da')        
                 ->assertViewHas('activityTableData', $activityTableData)
                 ->assertViewHas('show')
                 ->assertViewHas('BMI', $BMI)
                 ->assertViewHas('age', $formData['age'])
                 ->assertViewHas('email', $formData['email'])
                 ->assertViewHas('goal', $formData['weight']);
    }
}
