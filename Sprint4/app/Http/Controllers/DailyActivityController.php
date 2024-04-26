<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DailyActivityController extends Controller
{
    public function dailyactivity(Request $request)
    {
        $email = $request->only('email');
        $age = $request->only('age');
        $goal = $request->only('weight');

        //getting the email and do query
        $customer_info = Profile::where('email', $email)->first();
        $hh = $customer_info->height;
        $h = $hh * 0.0254;
        $w = $customer_info->current_weight;
        $b = $w / ($h * $h);
        $BMI = round($b);

        if ($BMI < 18) {
            $show = "Underweight";
        } elseif (18 <= $BMI and $BMI <= 25) {
            $show = "Normal Weight";
        } elseif (26 <= $BMI and $BMI <= 30) {
            $show = "Overweight";
        } elseif (31 <= $BMI and $BMI <= 35) {
            $show = "Obese";
        } elseif (36 <= $BMI) {
            $show = "Extremely Obese";
        }


        if ($BMI < 18) {
            $activityTableData = DB::table('bmi_under')->get();
        } elseif ($BMI > 26) {
            $activityTableData = DB::table('bmi_over')->get();
        } else {
            $activityTableData = DB::table('bmi_norm')->get();
        }

        return view('da', ['activityTableData' => $activityTableData, 'show' => $show, 'BMI' => $BMI, 'age' => $age['age'], 'email' => $email['email'], 'goal' => $goal['weight']]);
    }
}
