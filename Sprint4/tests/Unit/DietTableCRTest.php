<?php

namespace Tests\Unit;

use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DietTableCRTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_diet_table()
    {
        $formData = [
            'email' => 'niloy@g.com',
            'age' => '21 - 26',
            'weight' => 'Decrease',
        ];

        $dietTableData = collect([
        ]);

        DB::shouldReceive('table')->once()->with('dec_diet_table3')->andReturn($dietTableData);

        $response = $this->get('/diet-table', $formData);

        $response->assertViewIs('ddc')
                 ->assertViewHas('dietTableData', $dietTableData)
                 ->assertViewHas('age', $formData['age'])
                 ->assertViewHas('email', $formData['email'])
                 ->assertViewHas('goal', $formData['weight']);
    }
}
