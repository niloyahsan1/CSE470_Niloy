<?php

namespace Tests\Unit;

use App\Services\BmiService;
use PHPUnit\Framework\TestCase;

class BmiServiceTest extends TestCase
{
    private BmiService $bmiService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->bmiService = new BmiService();
    }

    public function test_it_calculates_bmi_correctly(): void
    {
        // 68 inches (1.7272 m), 65 kg -> 65 / (1.7272^2) = 21.78... -> rounded to 21.8
        $bmi = $this->bmiService->calculate(68, 65);
        $this->assertEquals(21.8, $bmi);
    }

    public function test_it_handles_zero_or_negative_height_gracefully(): void
    {
        $this->assertEquals(0.0, $this->bmiService->calculate(0, 65));
        $this->assertEquals(0.0, $this->bmiService->calculate(-10, 65));
    }

    public function test_it_categorizes_bmi_properly(): void
    {
        $this->assertEquals('Underweight', $this->bmiService->getCategory(17.5));
        $this->assertEquals('Normal Weight', $this->bmiService->getCategory(22.0));
        $this->assertEquals('Overweight', $this->bmiService->getCategory(27.5));
        $this->assertEquals('Obese', $this->bmiService->getCategory(32.0));
        $this->assertEquals('Extremely Obese', $this->bmiService->getCategory(38.0));
    }

    public function test_it_provides_recommended_action_properly(): void
    {
        $this->assertEquals('Increase', $this->bmiService->getRecommendedAction(17.0));
        $this->assertEquals('Decrease', $this->bmiService->getRecommendedAction(28.0));
        $this->assertEquals('Nothing', $this->bmiService->getRecommendedAction(22.0));
    }

    public function test_it_returns_correct_activity_table_name(): void
    {
        $this->assertEquals('bmi_under', $this->bmiService->getActivityTable(17.0));
        $this->assertEquals('bmi_over', $this->bmiService->getActivityTable(28.0));
        $this->assertEquals('bmi_norm', $this->bmiService->getActivityTable(22.0));
    }
}

