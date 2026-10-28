<?php

namespace App\Services;

class BmiService
{
    /**
     * Calculate BMI given height in inches and weight in kilograms.
     */
    public function calculate(float $heightInches, float $weightKg): float
    {
        if ($heightInches <= 0) {
            return 0.0;
        }

        $heightMeters = $heightInches * 0.0254;
        return round($weightKg / ($heightMeters * $heightMeters), 1);
    }

    /**
     * Get BMI category classification.
     */
    public function getCategory(float $bmi): string
    {
        if ($bmi < 18.5) {
            return 'Underweight';
        } elseif ($bmi <= 24.9) {
            return 'Normal Weight';
        } elseif ($bmi <= 29.9) {
            return 'Overweight';
        } elseif ($bmi <= 34.9) {
            return 'Obese';
        }

        return 'Extremely Obese';
    }

    /**
     * Get recommended goal action ('Increase', 'Decrease', or 'Maintain').
     */
    public function getRecommendedAction(float $bmi): string
    {
        if ($bmi < 18.5) {
            return 'Increase';
        } elseif ($bmi > 25.0) {
            return 'Decrease';
        }

        return 'Nothing';
    }

    /**
     * Return the database table name corresponding to the user's BMI activity group.
     */
    public function getActivityTable(float $bmi): string
    {
        if ($bmi < 18.5) {
            return 'bmi_under';
        } elseif ($bmi > 25.0) {
            return 'bmi_over';
        }

        return 'bmi_norm';
    }
}

